<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Testimonal;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function store()
    {
        $categories = Category::with('subcategories')->get();

        $products = Product::with(['subcategory.category'])
            ->latest('created_at')
            ->paginate(6);

        return view('store.store', compact('products', 'categories'));
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
            $count = count($cart);

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
    public function generateCartResponse($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * ($item['quantity'] ?? 1);
        }

        $discount = 0;
        $shipping = 0;
        $tax = 0;
        $total = $subtotal - $discount + $tax + $shipping;

        // Store the updated cart in cookies
        Cookie::queue('cart', json_encode($cart), 60 * 24); // 1 day expiry

        // return redirect()->back()->with('success', 'Cart updated!');

        // // Render the cart items using a Blade partial
        // $cartHtml = view('partials.cart-items', ['cart' => $cart])->render();

        return response()->json([
            'success' => true,
            //'cartHtml' => $cartHtml,
            'subtotalFormatted' => '$' . number_format($subtotal, 2),
            'totalFormatted' => '$' . number_format($total, 2),
        ]);
    }

    public function updateCart(Request $request)
    {
        $id = $request->input('id');
        $newQty = max(1, (int) $request->input('quantity'));

        $cart = json_decode(Cookie::get('cart', '[]'), true);

        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $newQty;
                break;
            }
        }

        Cookie::queue('cart', json_encode($cart), 60 * 24);

        return $this->generateCartResponse($cart);
    }

    public function removeFromCart(Request $request)
    {
        $id = $request->input('id');

        $cart = json_decode(Cookie::get('cart', '[]'), true);
        $cart = array_filter($cart, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        Cookie::queue('cart', json_encode(array_values($cart)), 60 * 24);

        return $this->generateCartResponse($cart);
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
        // Sorting logic
        if ($request->sort == 'low_to_high') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'high_to_low') {
            $query->orderBy('price', 'desc');
        } else {
            // "Most Popular" — just random for now
            $query->inRandomOrder();
        }
        $products = $query->latest('products.created_at')->paginate(6);
        $categories = Category::with('subcategories')->get();

        return view('store.store', compact('products', 'categories'));
    }
    public function storeCheckoutview()
    {
        return view('store.store-checkout');
    }
    public function storeCheckout(Request $request)
    {
        // // Retrieve the cart from cookies
        // $cart = json_decode(Cookie::get('cart', '[]'), true);

        // if (empty($cart)) {
        //     return redirect()->back()->with('error', 'Your cart is empty.');
        // }

        // // Validate the request (you may need to modify the rules based on your needs)
        // $request->validate([
        //     'first_name' => 'required|string',
        //     'phone' => 'required',
        //     'email' => 'required|email',
        //     'address1' => 'required',
        //     'country' => 'required',
        //     'state' => 'required',
        //     'city' => 'required',
        //     'zip_code' => 'required',
        // ]);

        // // Calculate total price of the cart
        // $subTotal = 0;
        // foreach ($cart as $item) {
        //     $subTotal += $item['price'] * $item['quantity'];
        // }

        // $totalAmount = $subTotal; // Add shipping/tax if applicable

        // // Store the order in the Orders table
        // $order = Orders::create([
        //     'user_id' => 1,
        //     'total_amount' => $totalAmount,
        //     'order_status' => 0, // e.g., 0 = pending
        //     'payment_status' => 0, // e.g., 0 = unpaid
        //     'payment_method' => 1, // Payment method (can be modified)
        //     'payment_id' => null, // This could be populated if using a payment gateway
        // ]);

        // // Save the order items in the OrderItems table
        // foreach ($cart as $item) {
        //     OrderItems::create([
        //         'order_id' => $order->id,
        //         'category_id' => $item['category_id'] ?? 1, // Handle category if provided
        //         'subcategory_id' => $item['subcategory_id'] ?? 1, // Handle subcategory if provided
        //         'product_id' => $item['id'],
        //         'quantity' => $item['quantity'],
        //         'price' => $item['price'],
        //         'total_price' => $item['price'] * $item['quantity'],
        //     ]);
        // }

        // // Clear the cart (if you want to clear it after the order is placed)
        // Cookie::queue(Cookie::forget('cart'));

        // // Optionally, redirect to a "thank you" or "order confirmation" page
        // return redirect()->route('customer.storesuccess')->with('success', 'Your order has been placed successfully!');

        // Retrieve the cart from cookies
        $cart = json_decode(Cookie::get('cart', '[]'), true);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Validate request
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

        // Check if user exists by email or create a new one

        // Get the authenticated user instance
        $user = Auth::user();
        if ($user) {
            // If the user is authenticated, get their ID
            $userId = $user->id;
        } else {
            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->first_name,
                    'user_name' => strtolower(Str::slug($request->first_name . '-' . uniqid())), // generate unique username
                    'mobile_no' => $request->phone,
                    'email' => $request->email,
                    'user_type' => 'customer', // Adjust based on your logic
                    'status' => 1,
                    // Add password or leave null, depending on your app logic
                    'password' => bcrypt('password123'), // Or generate random
                ]
            );
        }
        // Create or update primary address
        $address = Address::updateOrCreate(
            ['user_id' => $user->id, 'is_primary' => true],
            [
                'address' => $request->address1,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'postal_code' => $request->zip_code,
                'is_primary' => true
            ]
        );

        // Calculate total price of the cart
        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }

        $totalAmount = $subTotal;

        // Store the order
        $order = Orders::create([
            'user_id' => $user->id,
            'total_amount' => $totalAmount,
            'order_status' => 0,
            'payment_status' => 0,
            'payment_method' => 1,
            'payment_id' => null,
        ]);

        // Save order items
        foreach ($cart as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'category_id' => $item['category_id'] ?? 1,
                'subcategory_id' => $item['subcategory_id'] ?? 1,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }

        // Clear the cart
        Cookie::queue(Cookie::forget('cart'));

        //         // When new user registers
        // $affiliate = Affiliate::where('code', $referralCode)->first();
        // if ($affiliate) {
        //     // You can store somewhere that this user was referred by $affiliate->id
        // }

        // // When order is placed
        // AffiliateCommission::create([
        //     'affiliate_id' => $affiliate->id,
        //     'referred_user_id' => $newUserId,
        //     'order_id' => $orderId,
        //     'amount' => $commissionAmount,
        //     'paid' => false,
        // ]);

        //return redirect()->route('customer.storesuccess')->with('success', 'Your order has been placed successfully!');
        return redirect()
            ->route('customer.storesuccess')
            ->with('success', 'Your order has been placed successfully!')
            ->with('order_id', $order->id);
    }
    public function storesuccess()
    {
        return view('store.store-success');
    }

    public function clear()
    {

        Cookie::queue(Cookie::forget('cart'));
        Cookie::queue(Cookie::forget('coupon'));
        return redirect()->back()->with('success', 'Cart has been cleared.');
    }

    public function storeinvoice($orderId)
    {
        // Fetch order and related items with relationships needed for details invoice with customer module completed
        $order = Orders::findOrFail($orderId);
        $orderItems = OrderItems::where('order_id', $orderId)->get();

        return view('store.invoice', [
            'order' => $order,
            'orderItems' => $orderItems
        ]);
    }
    public function applyCoupon(Request $request)
    {

        $code = strtoupper(trim($request->input('coupon_code')));

        //Get cart from cookie (fallback to empty array)
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        $subtotal = 0;

        foreach ($cart as $item) {
            $quantity = $item['quantity'] ?? 1;
            $subtotal += $item['price'] * $quantity;
        }

        //Find coupon
        $coupon = Coupon::whereCode($code)->first();


        if (!$coupon) {
            // return response()->json([
            //     'success' => false,
            //     'message' => 'Invalid coupon code.'
            // ]);
            return redirect()->back()->with('error', 'Invalid coupon code.');
        }

        // Calculate discount
        if ($coupon->type === 'percentage') {
            $discount = $subtotal * ($coupon->value / 100);
        } else {
            $discount = min($coupon->value, $subtotal);
        }

        //Save the coupon to a cookie (so it stays for checkout later)
        Cookie::queue('coupon', json_encode([
            'code' => $coupon->code,
            'discount' => $discount
        ]), 60 * 24); // 1 day

        $total = $subtotal - $discount;
        $subtotal = 0;
        $discount = 0;
        $total = 0;
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Coupon applied successfully!',
        //     'subtotalFormatted' => '$' . number_format($subtotal, 2),
        //     'discountFormatted' => '$' . number_format($discount, 2),
        //     'totalFormatted' => '$' . number_format($total, 2)
        // ]);
        return redirect()->back()->with('success', 'Coupon applied successfully!');
    }
}
