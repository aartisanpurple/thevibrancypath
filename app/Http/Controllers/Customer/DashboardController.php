<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Membership;


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
    public function myorder()
    {

        $user = Auth::user();

        // Get user's orders with related order items and product (including category)
        $orders = Orders::with(['order_items.product.category'])
            ->where('user_id', $user->id)
            ->get();

        return view('dashboard.myorder', compact('user', 'orders'));
    }
    public function mymembership()
    {

        $user = Auth::user();

        // Fetch the membership for the authenticated user
        $membership = Membership::where('user_id', $user->id)->get();
    
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
