<?php

namespace App\Http\Controllers\Auth;

use App\Models\Appointment;

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
use App\Models\UserMembership;


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
    public function termsandconditions()
    {
        return view('customer.termsandconditions');
    }

    public function courses()
    {
        return view('customer.courses');
    }

    public function courseshealthycravings()
    {
        return view('customer.courses-healthy-cravings');
    }
    public function coursescalmingyouranxiety()
    {
        return view('customer.courses-calming-your-anxiety');
    }

    public function courseslovingrelationships()
    {
        return view('customer.courses-loving-relationships');
    }

    public function membership()
    {
        return view('customer.membership');
    }

    public function membershipcheckout(Request $request)
    {
        // Validate incoming data
        $data = $request->validate([
            'type' => 'required|string',
            'price' => 'required|numeric',
            'validity_days' => 'required|integer',
        ]);

        // Optionally store in session or directly pass to view
        return view('auth.membershipcheckout', compact('data'));
    }

    public function createmembership(Request $request)
    {
        return view('auth.membershipcheckout');
    }



    public function storemembership(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'validity_days' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        if (!$user) {
            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'user_name' => strtolower(Str::slug($request->name . '-' . uniqid())),
                    'mobile_no' => $request->mobile_no,
                    'user_type' => 'customer',
                    'status' => 1,
                    'password' => bcrypt('password123'),
                ]
            );
        }

        $startDate = now();
        $endDate = $startDate->copy()->addDays((int) $request->validity_days);

        $UserMembership = UserMembership::create([
            'user_id' => $user->id,
            'type' => $request->type,
            'price' => $request->price,
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
        ]);



        return redirect()->route('membershipcomplete')->with('success', 'Membership has been completed.');
    }

    public function membershipcomplete(Request $request)
    {
        return view('customer.membershipcomplete');
    }

    public function appointment(Request $request)
    {
        return view('customer.appointment');
    }

    public function storeAppointment(Request $request)
    {

        
        // $request->validate([
        //     'appointment_time' => 'required|date',
        //     'notes' => 'nullable|string|max:1000',
        // ]);
        // $appointment = Appointment::create([
        //     'user_id' => 15,
        //     'name' => "test",
        //     'email' => "mytest@dhgdj.com",
        //     'appointment_time' => \Carbon\Carbon::parse($request->appointment_time)->toDateTimeString(),
        //     'notes' => $request->notes,
        // ]);


        // return redirect()->route('customer.appointment')->with('success', 'Appointment booked successfully!');


        $request->validate([
            'appointment_time' => 'required|date',
            'notes' => 'nullable|string|max:1000',
            'name' => 'required_if:guest,true|string|max:255',
            'email' => 'required_if:guest,true|email|max:255',
            'mobile_no' => 'required_if:guest,true|string|max:20',
        ]);
    
        // Get authenticated user or create one
        $user = Auth::user();
    
        if (!$user) {
            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'user_name' => strtolower(Str::slug($request->name . '-' . uniqid())),
                    'mobile_no' => $request->mobile_no,
                    'user_type' => 'customer',
                    'status' => 1,
                    'password' => bcrypt('password123'),
                ]
            );
        }
    
        // Create appointment
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'appointment_time' => \Carbon\Carbon::parse($request->appointment_time)->toDateTimeString(),
            'notes' => $request->notes,
        ]);
    
        return redirect()->route('customer.appointment')->with('success', 'Appointment booked successfully!');
    
    }
}
