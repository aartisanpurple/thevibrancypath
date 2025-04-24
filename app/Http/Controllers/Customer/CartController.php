<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Testimonal;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Orders;
use App\Models\OrderItems;

class CartController extends Controller
{
    public function store()
    {
        $categories = Category::with('subcategories')->get();

        $products = Product::leftJoin('subcategory', 'products.subcategory_id', '=', 'subcategory.id')
            ->leftJoin('category', 'subcategory.parent_id', '=', 'category.id')
            ->select(
                'products.*',
                'subcategory.id as subcategory_id',
                'subcategory.name as subcategory_name',
                'category.id as category_id',
                'category.name as category_name'
            )
            ->latest('products.created_at')
            ->paginate(6);

        return view('store.store', compact('products', 'categories'));
    }
    public function storeDetails($id)
    {
        $store = Product::find($id);
        $products = Product::leftJoin('subcategory', 'products.subcategory_id', '=', 'subcategory.id')
            ->leftJoin('category', 'subcategory.parent_id', '=', 'category.id')
            ->select(
                'products.*',
                'subcategory.id as subcategory_id',
                'subcategory.name as subcategory_name',
                'category.id as category_id',
                'category.name as category_name'
            )
            ->latest('products.created_at')
            ->get();
        return view('store.store-detail', compact('store', 'products'));
    }
    public function storeApi(Request $request)
    {
       // Handle AJAX Add to Cart
    if ($request->ajax()) {
        // Retrieve the cart from the cookies, if it exists, or create a new one
        $cart = json_decode(Cookie::get('cart', '[]'), true);

        // Get product details from the request
        $productId = $request->input('product_id');
        $productName = $request->input('product_name');
        $productPrice = $request->input('product_price');
        $quantity = $request->input('quantity', 1); // Default quantity is 1

        // Check if the product already exists in the cart
        $productExists = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += $quantity; // Increase quantity if it exists
                $productExists = true;
                break;
            }
        }

        // If not in cart, add as new item
        if (!$productExists) {
            $cart[] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => $quantity
            ];
        }

        // Save cart back to cookies (for 1 day)
        Cookie::queue('cart', json_encode($cart), 60 * 24);

        // Calculate total item count in the cart
        $count = array_sum(array_column($cart, 'quantity'));

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart!',
            'count' => $count
        ]);
    }

    // For normal (non-AJAX) requests, return the store view
   // $products = Product::all();
   // return view('store', compact('products'));

    }
    public function storeCart()
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        return view('store.store-cart', compact('cart'));
    }
    public function storesavecart(Request $request)
    {
        // Retrieve the cart from the cookies, if it exists, or create a new one.
        $cart = json_decode(Cookie::get('cart', '[]'), true);

        // Get product details from the request
        $productId = $request->input('product_id');
        $productName = $request->input('product_name');
        $productPrice = $request->input('product_price');
        $quantity = $request->input('quantity', 1); // Default quantity is 1 if not provided

        // Check if the product already exists in the cart
        $productExists = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += $quantity; // Increase quantity if product already exists
                $productExists = true;
                break;
            }
        }

        // If the product does not exist in the cart, add it as a new product
        if (!$productExists) {
            $cart[] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => $quantity
            ];
        }

        // Store the updated cart in cookies
        Cookie::queue('cart', json_encode($cart), 60 * 24); // 1 day expiry

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    public function updateCart(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;

        // Update cart logic here (e.g., using session or database)
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        // Calculate updated cart values
        $cartSubtotal = 0;
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartSubtotal += $item['price'] * $item['quantity'];
        }
        $cartTotal = $cartSubtotal; // For simplicity, no tax or shipping

        return response()->json([
            'success' => true,
            'new_price' => $cart[$productId]['price'],
            'cart_subtotal' => $cartSubtotal,
            'cart_total' => $cartTotal
        ]);
    }
    public function removeFromCart(Request $request)
    {
        $productId = $request->product_id;

        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        // Recalculate the cart totals
        $cartSubtotal = 0;
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartSubtotal += $item['price'] * $item['quantity'];
        }
        $cartTotal = $cartSubtotal; // For simplicity, no tax or shipping

        return response()->json([
            'success' => true,
            'cart_subtotal' => $cartSubtotal,
            'cart_total' => $cartTotal,
            'cart_count' => count($cart)
        ]);
    }
    public function search(Request $request)
    {
        $query = Product::query()
            ->leftJoin('subcategory', 'products.subcategory_id', '=', 'subcategory.id')
            ->leftJoin('category', 'subcategory.parent_id', '=', 'category.id')
            ->select(
                'products.*',
                'subcategory.id as subcategory_id',
                'subcategory.name as subcategory_name',
                'category.id as category_id',
                'category.name as category_name'
            );

        // Keyword search (grouped properly with parentheses)
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('products.name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('products.description', 'like', '%' . $request->keyword . '%');
            });
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category.id', $request->category_id);
        }

        // Filter by subcategory
        if ($request->filled('subcategory_id')) {
            $query->where('subcategory.id', $request->subcategory_id);
        }

        $products = $query->latest('products.created_at')->paginate(6);
        $categories = Category::with('subcategories')->get();

        return view('auth.store', compact('products', 'categories'));
    }
    public function storeCheckoutview()
    {
        return view('store.store-checkout');
    }
    public function storeCheckout(Request $request)
    {
        // Retrieve the cart from cookies
        $cart = json_decode(Cookie::get('cart', '[]'), true);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Validate the request (you may need to modify the rules based on your needs)
        $request->validate([
            'first_name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'address1' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
        ]);

        // Calculate total price of the cart
        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }

        $totalAmount = $subTotal; // Add shipping/tax if applicable

        // Store the order in the Orders table
        $order = Orders::create([
            'user_id' => 1,
            'total_amount' => $totalAmount,
            'order_status' => 0, // e.g., 0 = pending
            'payment_status' => 0, // e.g., 0 = unpaid
            'payment_method' => 1, // Payment method (can be modified)
            'payment_id' => null, // This could be populated if using a payment gateway
        ]);

        // Save the order items in the OrderItems table
        foreach ($cart as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'category_id' => $item['category_id'] ?? 1, // Handle category if provided
                'subcategory_id' => $item['subcategory_id'] ?? 1, // Handle subcategory if provided
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }

        // Clear the cart (if you want to clear it after the order is placed)
        Cookie::queue(Cookie::forget('cart'));

        // Optionally, redirect to a "thank you" or "order confirmation" page
        return redirect()->route('customer.storesuccess')->with('success', 'Your order has been placed successfully!');
    }
    public function storesuccess()
    {
        return view('store.store-success');
    }
    
    public function clear()
    {

        Cookie::queue(Cookie::forget('cart'));
        return redirect()->back()->with('success', 'Cart has been cleared.');
    }
}
