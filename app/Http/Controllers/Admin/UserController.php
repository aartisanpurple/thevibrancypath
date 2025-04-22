<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function store(Request $request)
    {
        $isUpdate = $request->has('id');
        $validationRules = [
            'name' => 'string|max:255',
            'email' => 'email',
            'password' => 'string|max:255',
            'user_type' => 'string|max:255',
            'mobile_no' => 'string|max:255',
            'address' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'state' => 'nullable|max:255',
            'country' => 'nullable|max:255',
            'postal_code' => 'nullable|max:255',
            'status' => 'in:active,inactive',
        ];

        $request->validate($validationRules);
        try {
            if (isset($request->id) || $request->id != null) {
                $user = User::find($request->id);
                $user->update($request->all());  
                $message = 'User updated successfully!';
            }else{
                        
                $user = User::create($request->all());
                $message = 'User added successfully!';
            }
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'message' => $message,
                    'redirect_url' => route('admin.user.index') // Pass the URL
                ]);
            }
            // Redirect back with a success message
            return redirect()->route('admin.user.index')->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')->with('error', 'Failed to add user: ' . $e->getMessage());
        }
    }
    public function destroy(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User deleted successfully!',
                    'redirect_url' => route('admin.user.index')
                ]);
            }
            return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
