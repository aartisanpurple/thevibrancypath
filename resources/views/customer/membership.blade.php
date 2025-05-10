@extends('layouts.customer.app')

@section('content')
<style>
    #membership-section {
        background-color: #faf7f3;
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .card-light {
        background-color: #fbeef7;
        border-radius: 25px;
    }

    .card-purple {
        background-color: #9b2282;
        border-radius: 25px;
    }

    .btn-custom {
        background-color: #8b0078 !important;
        border-color: #8b0078 !important;
        color: #fff !important;
        border-radius: 30px !important;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: all 0.3s ease-in-out;
    }

    .btn-custom:hover {
        background-color: #fff !important;
        border-color: #8b0078 !important;
        color: #8b0078 !important;
        cursor: pointer;
    }

    .btn-reversed {
        background-color: #fff !important;
        border: 2px solid #8b0078 !important;
        color: #8b0078 !important;
        border-radius: 30px !important;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: all 0.3s ease-in-out;
        font-weight: 500;
    }

    .btn-reversed:hover {
        background-color: #8b0078 !important;
        color: #fff !important;
    }
</style>

<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Membership</h2>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #faf7f3;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-3">Vibrancy Signature Membership Package</h2>
                <p class="text-muted mb-4">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <div class="d-flex justify-content-center gap-3">
                    <!-- $100 Modal Trigger -->
                    <button type="button" class="btn btn-primary px-4 btn-custom"
                        data-bs-toggle="modal"
                        data-bs-target="#joinMembershipModal"
                        data-price="100"
                        data-type="Vibrancy Signature Membership">
                        Join Membership
                    </button>

                    <a href="{{ route('customer.vibrancy-signature') }}" class="btn btn-outline-secondary px-4">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="membership-section" class="py-5">
    <div class="container">
        <div class="row justify-content-center g-4">
            <!-- Left Card -->
            <div class="col-lg-5">
                <div class="card h-100 border-0 shadow-sm p-4 card-light">
                    <h2 class="mb-3" style="font-size: 2.5rem;">$100</h2>
                    <h5 class="mb-4" style="font-weight: bold;">$100, includes:</h5>
                    <ul class="text-muted text-start list-unstyled">
                        <li>1) Vibrancy Signature Evaluation with Jamie Champion</li>
                        <li>2) Customized eBook download</li>
                        <li>3) 2 hr Vibrancy Signature Discovery Coaching Session with Chaya Champion</li>
                        <li>4) Unlimited access to all premium content</li>
                        <li>5) Access to the private members-only community</li>
                        <li>6) Monthly live Q&A + replay library</li>
                    </ul>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-primary px-4 btn-custom"
                            data-bs-toggle="modal"
                            data-bs-target="#joinMembershipModal"
                            data-price="100"
                            data-type="Vibrancy Signature Membership">
                            Join Membership
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Card -->
            <div class="col-lg-5">
                <div class="card h-100 border-0 shadow-sm p-4 text-white" style="background-color: #9b2282; border-radius: 25px;">
                    <h2 class="mb-3" style="font-size: 2.5rem;">$295</h2>
                    <h5 class="mb-4"> $295, includes:</h5>
                    <ul class="text-start list-unstyled">
                        <li>1) Vibrancy Signature Evaluation with Jamie Champion</li>
                        <li>2) Customized eBook download</li>
                        <li>3) 2 hr Vibrancy Signature Discovery Coaching Session with Chaya Champion</li>
                        <li>4) Unlimited access to all premium content</li>
                        <li>5) Access to the private members-only community</li>
                        <li>6) Monthly live Q&A + replay library</li>
                        <li>7) Unlimited access to all premium content</li>
                        <li>8) Access to the private members-only community</li>
                        <li>9) Monthly live Q&A + replay library</li>
                        <li>10) Unlimited access to all premium content</li>
                    </ul>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-reversed px-4"
                            data-bs-toggle="modal"
                            data-bs-target="#joinMembershipModal"
                            data-price="295"
                            data-type="Vibrancy Signature Membership Premium">
                            Join Membership
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="joinMembershipModal" tabindex="-1" aria-labelledby="joinMembershipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="joinMembershipModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="client-info-tab" data-bs-toggle="tab" href="#client-info" role="tab" aria-controls="client-info" aria-selected="true">Client Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="payment-tab" data-bs-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Checkout</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content mt-4" id="myTabContent">
                    <!-- Client Information Tab -->
                    <div class="tab-pane fade show active" id="client-info" role="tabpanel" aria-labelledby="client-info-tab">
                        <form action="" method="POST">
                            @csrf

                            <!-- Hidden Membership Data -->
                            <input type="hidden" name="price" id="modal-membership-price">
                            <input type="hidden" name="type" id="modal-membership-type">

                            <!-- If user is authenticated, fill out the form with user data -->
                            @auth
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="mobile_no" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_no" value="{{ auth()->user()->mobile_no }}" required>
                            </div>
                            @else
                            <!-- If the user is not authenticated, show the fields for them to manually fill -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="mobile_no" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_no" required>
                            </div>
                            @endauth
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="tab" data-bs-target="#payment">Checkout</button>
                            </div>

                        </form>
                    </div>

                    <!-- Payment Information Tab -->
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        <form action="{{ route('customer.appointment.store') }}" method="POST">
                            @csrf

                            <!-- Hidden Membership Data -->
                            <input type="hidden" name="price" id="modal-membership-price">
                            <input type="hidden" name="type" id="modal-membership-type">

                            <!-- Payment form fields (credit card, etc.) -->
                            <div class="mb-3">
                                <label for="card_number" class="form-label">Card Number</label>
                                <input type="text" class="form-control" name="card_number" placeholder="**** **** **** ****" required>
                            </div>

                            <div class="mb-3">
                                <label for="expiry_date" class="form-label">Expiry Date</label>
                                <input type="month" class="form-control" name="expiry_date" required>
                            </div>

                            <div class="mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" name="cvv" placeholder="***" required>
                            </div>



                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- JavaScript to Inject Dynamic Data -->
<script>
    const modal = document.getElementById('joinMembershipModal');

    modal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const price = button.getAttribute('data-price');
        const type = button.getAttribute('data-type');

        document.getElementById('modal-membership-price').value = price;
        document.getElementById('modal-membership-type').value = type;
    });
</script>
@endsection