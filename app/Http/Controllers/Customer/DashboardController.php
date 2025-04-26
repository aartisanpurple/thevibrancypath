<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;


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
