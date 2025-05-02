<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $productCount = Product::count();
        $orderCount = Orders::count();
    
        return view('admin.dashboard', compact('productCount', 'orderCount'));
       // return view('admin.dashboard');
    }
}
