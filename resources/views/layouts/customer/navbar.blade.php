   <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-light fixed-top">
       <div class="container">
           <a class="navbar-brand" href="#">
               <img src="{{ asset('assets/images/logo-frontend.svg') }}" alt="">
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav mx-auto">
                   <li class="nav-item"><a class="nav-link {{ request()->routeIs('customer.home') ? 'active' : '' }}" href="{{ route('customer.home') }}">Home</a></li>
                   <li class="nav-item"><a class="nav-link {{ request()->routeIs('customer.about') ? 'active' : '' }}" href="{{ route('customer.about') }}">About</a></li>
                   <li class="nav-item"><a class="nav-link {{ request()->routeIs('customer.course') ? 'active' : '' }}" href="javascript:void(0)">Courses</a></li>
                   <li class="nav-item"><a class="nav-link {{ request()->routeIs('customer.store') ? 'active' : '' }}" href="{{ route('customer.store') }}">Store</a></li>
                   <li class="nav-item"><a class="nav-link {{ request()->routeIs('customer.package') ? 'active' : '' }}" href="javascript:void(0)">Packages</a></li>
                   <li class="nav-item"><a class="nav-link {{ request()->routeIs('customer.blog') ? 'active' : '' }}" href="{{ route('customer.blog') }}">Blog</a></li>
                   <li class="nav-item"><a class="nav-link {{ request()->routeIs('customer.contact') ? 'active' : '' }}" href="{{ route('customer.contact') }}">Contact</a></li>
               </ul>
               <div class="nav-icons">
                   <a href="{{ route('login') }}"><i class="ri-user-line"></i></a>
                   <a href="javascript:void(0)"><i class="ri-search-line"></i></a>
                   @php
                   $cart = json_decode(request()->cookie('cart'), true) ?? [];
                   $cartCount = count($cart);
                   @endphp
                   <a href="{{ route('customer.storecart') }}" class="position-relative">
                       <i class="ri-shopping-cart-line" style="font-size: 1.2rem;"></i>
                       <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                           {{ $cartCount ?? 0 }}
                       </span>
                   </a>
               </div>
           </div>
       </div>
   </nav>