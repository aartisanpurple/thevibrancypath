<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Testimonal;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonal::latest()->get();
        return view('auth.home', compact('testimonials'));
    }
    public function about()
    {
        return view('customer.abouts');
    }
    public function contact()
    {
        return view('customer.contact');
    }
    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        try {
            $contact = Contact::create($validated);
            return redirect()->route('customer.contact')->with('success', 'Thank you for contacting us');
        } catch (\Exception $e) {
            return redirect()->route('customer.contact')->with('error', 'Message not sent');
        }
    }

    public function blog()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->paginate(5);
        return view('customer.blog', compact('blogs'));
    }
    public function blogDetails($id)
    {
        $blog = Blog::find($id);
        return view('customer.blog-detail', compact('blog'));
    }
    public function coaching()
    {
        return view('auth.coaching');
    }
    public function coachingDetails()
    {
        return view('auth.coaching-details');
    }
    public function products()
    {
        return view('auth.products');
    }
    public function productDetails()
    {
        return view('auth.product-details');
    }
    public function order()
    {
        return view('auth.order');
    }
    public function orderDetails()
    {
        return view('auth.order-details');
    }
    public function cart()
    {
        return view('auth.cart');
    }
    public function cartDetails()
    {
        return view('auth.cart-details');
    }
    public function checkout()
    {
        return view('auth.checkout');
    }
    public function checkoutDetails()
    {
        return view('auth.checkout-details');
    }
    public function faq()
    {
        return view('auth.faq');
    }
    public function faqDetails()
    {
        return view('auth.faq-details');
    }
    public function terms()
    {
        return view('auth.terms');
    }
    public function termsDetails()
    {
        return view('auth.terms-details');
    }
    public function privacy()
    {
        return view('auth.privacy');
    }
    public function privacyDetails()
    {
        return view('auth.privacy-details');
    }
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

        return view('auth.store', compact('products', 'categories'));
    }
    public function storeApi(Request $request)
    {
        // Example of products data, replace with your actual products logic
        $products = Product::all(); // Fetch all products

        // Check if the request is AJAX (to return JSON for AJAX requests)
        if ($request->ajax()) {
            return response()->json([
                'products' => $products, // Send products as a JSON response
                'status' => 'success',
            ]);
        }

        // Regular request (non-AJAX) will return a view
        return view('store', compact('products')); // Return the store view with products
    }

    // In CartController.php
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
        return view('auth.store-detail', compact('store', 'products'));
    }
    public function storeCart()
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        return view('auth.store-cart', compact('cart'));
        //return view('auth.store-cart');
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
    public function clear()
    {

        Cookie::queue(Cookie::forget('cart'));
        return redirect()->back()->with('success', 'Cart has been cleared.');
    }


    public function storeCheckout()
    {

        return view('auth.store-checkout');
    }
}
