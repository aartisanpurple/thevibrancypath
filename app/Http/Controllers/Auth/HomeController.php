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
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
    public function privacyDetails()
    {
        return view('auth.privacy-details');
    }
    public function coaching()
    {
        return view('customer.coaching');
    }
    public function privacy()
    {
        return view('customer.privacy');
    }
    public function courses()
    {
        return view('customer.courses');
    }
    public function membership()
    {
        return view('customer.membership');
    }
    
    public function membershipjoin(Request $request)
    {
        $request->validate([
            'type' => 'required|in:basic,premium',
        ]);

        $user = Auth::user();
        $type = $request->input('type');
        $duration = $type === 'basic' ? 90 : 180;

        $start = Carbon::now();
        $end = $start->copy()->addDays($duration);

        // Upsert (create or update) membership
        // $user->membership()->updateOrCreate(
        //     ['user_id' => $user->id],
        //     [
        //         'type' => $type,
        //         'start_date' => $start,
        //         'end_date' => $end,
        //     ]
        // );

        return redirect()->route('dashboard')->with('success', 'Membership activated!');
    }

}
