<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Membership;
use App\Models\Appointment;
use App\Models\UserMembership;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('dashboard.dashboard', compact('user')); // Pass user to view
    }
    public function myprofile()
    {

        $user = Auth::user(); // Get logged-in user

        // Get user's orders with related order items
        $orders = Orders::with('order_items')->where('user_id', $user->id)->get();

        return view('dashboard.profile', compact('user', 'orders'));
    }


    public function updateProfile(Request $request)
    {

        // Redirect or return with a success message
        return redirect()->route('customer.myprofile')->with('success', 'Profile updated successfully!');
    }


    public function myorder()
    {

        $user = Auth::user();

        // Get user's orders with related order items and product (including category)
        $orders = Orders::with(['order_items.product.category'])
            ->where('user_id', $user->id)
            ->latest() // same as orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.myorder', compact('user', 'orders'));
    }
    public function myordercourses()
    {
        $user = Auth::user();

        // Get user's orders that include products in category ID 3
        $orders = Orders::with(['order_items.product.category'])
            ->where('user_id', $user->id)
            ->whereHas('order_items.product.category', function ($query) {
                $query->where('id', 3);
            })
            ->get();

        return view('dashboard.myordercourses', compact('user', 'orders'));
    }
    public function coachingappointment()
    {
        $user = Auth::user();

        // Get user's orders that include products in category ID 3
        $orders = Appointment::where('user_id', $user->id)
            ->orderBy('appointment_time', 'desc')
            ->get();

        return view('dashboard.coachingappointment', compact('user', 'orders'));
    }


    public function mymembership()
    {

        $user = Auth::user();

        // Fetch the membership for the authenticated user

        // Fetch all memberships for the authenticated user
        $membership = UserMembership::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.mymembership', compact('user', 'membership'));
    }
    public function addresses()
    {

        $user = User::find(1); // Example user

        // Get all addresses
        $addresses = $user->addresses;

        // Get primary address ID
        $primaryAddress = $user->primaryAddress;
        $primaryAddressId = $primaryAddress ? $primaryAddress->id : null;

        return view('dashboard.dashboard', compact('addresses', 'primaryAddressId'));
    }
}
