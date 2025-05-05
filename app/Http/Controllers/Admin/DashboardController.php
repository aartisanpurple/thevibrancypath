<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Orders;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $orderCount = Orders::count();
        $categoryCount = Category::count();

        $userCount = User::count();
    
        return view('admin.dashboard', compact('productCount', 'orderCount', 'categoryCount', 'userCount'));
    }
    
}
