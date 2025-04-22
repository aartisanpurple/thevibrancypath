<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Providers\AppServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('customer.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin-login'); // Ensure this Blade file exists
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Check if user has admin role
            if (Auth::user()->user_type === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->user_type === 'customer') {
                return redirect()->route('customer.dashboard');
            }
            // If not admin, logout and return with error
            Auth::logout();
            return back()->withErrors(['email' => 'Unauthorized access']);
        }
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('admin.dashboard');
        // }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register'); // Ensure this Blade file exists
    }

    public function UserRegister(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_name' => $request->user_name,
                'mobile_no' => $request->mobile_no,
            ]);

            return redirect()->route('login')->with('success', 'User registered successfully');
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Failed to register user');
        }
    }
    
}
