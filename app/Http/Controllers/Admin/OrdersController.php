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
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
{

    $order = Orders::with([
        'order_items.product',       // Loads related products for each item
        'user',                      // Loads the user who placed the order
    ])->findOrFail($id);

    return view('admin.orders.show', compact('order'));
}


public function pending()
{

    $order = Orders::where('status', 'pending')->get();

    return view('admin.orders.show', compact('order'));
}


}
