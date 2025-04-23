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
        $category = Category::with('subcategories')->get(); 
      
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

       // return view('auth.store', compact('products'));
        return view('auth.store', compact('products', 'category'));
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
    $product = [
        'id' => $request->input('product_id'),
        'name' => $request->input('product_name'),
        'price' => $request->input('product_price'),
    ];

    // Add the product to the cart
    $cart[] = $product;

    // Store the updated cart in cookies
    Cookie::queue('cart', json_encode($cart), 60 * 24); // 1 day expiry

    return redirect()->back()->with('success', 'Product added to cart!');
       // return view('auth.store-cart');
    }

    public function storeCheckout()
    {
       
        return view('auth.store-checkout');
    }


    
}

