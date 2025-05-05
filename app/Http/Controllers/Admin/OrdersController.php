<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::with(['order_items' => function ($query) {
            $query->select('id', 'order_id', 'category_id', 'subcategory_id', 'product_id', 'quantity', 'price', 'total_price');
        }])
        ->select('id', 'user_id', 'total_amount', 'order_status', 'payment_status', 'payment_method', 'payment_id')
        ->orderBy('id', 'asc') // Sort by ID: latest order first
        ->get();
        return view('admin.orders.index', compact('orders'));
    }
}
