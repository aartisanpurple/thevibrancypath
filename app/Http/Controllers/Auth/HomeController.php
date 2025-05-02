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
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonal::latest()->get();
        return view('auth.home', compact('testimonials'));
    }
    public function indexnew()
    {
        $testimonials = Testimonal::latest()->get();
        return view('auth.homenew', compact('testimonials'));
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
    public function vibrancysignature()
    {
        return view('customer.vibrancysignature');
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

    
    // public function createmembership(): View
    // {

    //     return view('auth.membershipcheckout');
    // }

    // public function storemembership(Request $request): RedirectResponse
    // {
       
    //      // Create a default membership (modify as needed)
    // Membership::create([
    //     'user_id' => Auth::id(),
    //     'type' => 'standard',
    //     'start_date' => now()->toDateString(),
    //     'end_date' => now()->addYear()->toDateString(),
    // ]);

    // return redirect()->back()->with('success', 'membership has been completed.');
    
    // }

    public function createmembership(Request $request)
    {
        return view('auth.membershipcheckout');
    }
    
    public function storemembership(Request $request)
    {
        // $request->validate([
        //     'type' => 'required|in:basic,premium',
        // ]);
       

           // Get the authenticated user instance
           $user = Auth::user();
           if ($user) {
               // If the user is authenticated, get their ID
               $userId = $user->id;
           } else {
               $user = User::firstOrCreate(
                   ['email' => $request->email],
                   [
                       'name' => $request->name,
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
        $type = $request->input('type');
        $duration = $type === 'basic' ? 90 : 180;
        $start = Carbon::now();
        $end = $start->copy()->addDays($duration);

        Membership::create([
        'user_id' => $user->id,
        'type' => 'standard',
        'start_date' => now()->toDateString(),
        'end_date' => now()->addYear()->toDateString(),
    ]);

        return redirect()->back()->with('success', 'membership has been completed.');
    }

}
