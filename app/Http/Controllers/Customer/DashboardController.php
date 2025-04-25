<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }

    public function addresses()
    {

        $user = User::find(1); // Example user

        // Get all addresses
        $addresses = $user->addresses;

        // Get primary address ID
        $primaryAddress = $user->primaryAddress;
        $primaryAddressId = $primaryAddress ? $primaryAddress->id : null;

        return view('customer.dashboard', compact('addresses', 'primaryAddressId'));
    }
}
