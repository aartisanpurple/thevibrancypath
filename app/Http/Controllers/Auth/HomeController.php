<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.home');
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
}

