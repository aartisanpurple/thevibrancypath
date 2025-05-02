@extends('layouts.customer.app')

@section('content')
<!-- Hero Section -->
<section class="inner_banner">
  <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
  <div class="inner_banner_caption d-flex align-items-center" style="min-height: 300px;">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-10">
          <h2>Store</h2>
        </div>
      </div>
    </div>
  </div>
  <h4 class="text-center mt-3">Welcome to The Vibrancy Path.</h4>
</section>
@php
$cart = json_decode(request()->cookie('cart', '[]'), true);

$subtotal = 0;
foreach ($cart as $item) {
$subtotal += $item['price'] * $item['quantity'];
}
$coupon = json_decode(Cookie::get('coupon', '{}'), true);
$discount = isset($coupon['discount']) ? $coupon['discount'] : 0;
$tax = 0; // Add tax calculation here (e.g., $subtotal * 0.18)
$total = $subtotal - $discount + $tax;
@endphp

<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row g-4">

      <!-- Billing Info -->
      <div class="col-lg-8">
        <div class="card p-4">
          <h5 class="mb-4">Billing Information</h5>

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif


          @auth
<form action="{{ route('customer.storecheckout') }}" method="POST">
  @csrf

  @if ($addresses = Auth::user()->addresses ?? null)
  <div class="mb-3">
    @foreach ($addresses as $address)
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="selected_address_id"
        id="address_{{ $address->id }}" value="{{ $address->id }}"
        data-firstname="{{ $address->first_name }}"
        data-lastname="{{ $address->last_name }}"
        data-phone="{{ $address->phone }}"
        data-email="{{ $address->email }}"
        data-address1="{{ $address->address }}"
        data-address2="{{ $address->address2 }}"
        data-country="{{ $address->country }}"
        data-state="{{ $address->state }}"
        data-city="{{ $address->city }}"
        data-zip="{{ $address->postal_code }}">
      <label class="form-check-label" for="address_{{ $address->id }}">
        {{ $address->address }}, {{ $address->city }}, {{ $address->state }} - {{ $address->postal_code }}
      </label>
    </div>
    @endforeach

    <div class="form-check">
      <input class="form-check-input" type="radio" name="selected_address_id" id="new_address" value="new">
      <label class="form-check-label" for="new_address">Add New Address</label>
    </div>
  </div>
  @endif

  <!-- New Address Fields -->
  <div id="new-address-fields" style="display: none;">
    <p class="fw-bold">Enter Address:</p>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">First name *</label>
        <input type="text" name="first_name" class="form-control" placeholder="First name">
      </div>
      <div class="col-md-6">
        <label class="form-label">Last name</label>
        <input type="text" name="last_name" class="form-control" placeholder="Last name">
      </div>
      <div class="col-md-6">
        <label class="form-label">Phone *</label>
        <input type="tel" name="phone" class="form-control">
      </div>
      <div class="col-md-6">
        <label class="form-label">Email *</label>
        <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
      </div>
      <div class="col-md-6">
        <label class="form-label">Address 1 *</label>
        <input type="text" name="address1" class="form-control" placeholder="Enter address">
      </div>
      <div class="col-md-6">
        <label class="form-label">Address 2</label>
        <input type="text" name="address2" class="form-control" placeholder="Enter address">
      </div>
      <div class="col-md-4">
        <label class="form-label">Country *</label>
        <select class="form-select" name="country" required>
        <option value="Afghanistan">Afghanistan</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="East Timor">East Timor</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Greece">Greece</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia">Micronesia</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="North Korea">North Korea</option>
                  <option value="North Macedonia">North Macedonia</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestine">Palestine</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option value="Saint Lucia">Saint Lucia</option>
                  <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Korea">South Korea</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Togo">Togo</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City">Vatican City</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
        </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">State *</label>
        <input type="text" name="state" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">City *</label>
        <input type="text" name="city" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">ZIP/Postal Code *</label>
        <input type="text" name="zip_code" class="form-control">
      </div>
    </div>
  </div>

  <!-- Cart Summary as Hidden Fields -->
  <input type="hidden" name="subtotal" value="{{ $subtotal }}">
  <input type="hidden" name="discount" value="{{ $discount }}">
  <input type="hidden" name="tax" value="{{ $tax }}">
  <input type="hidden" name="total" value="{{ $total }}">

  <div class="mt-4">
    <button type="submit" class="btn btn-primary w-100">Place Order →</button>
  </div>
</form>
@endauth
        
            @guest
            <div class="mb-3">
              <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Log in here</a></p>
            </div>
          <form action="{{ route('customer.storecheckout') }}" method="POST">
            @csrf
            <!-- Show full form to guests -->
            <div class="row g-3 mt-3">
              <div class="col-md-6">
                <label class="form-label">First name *</label>
                <input type="text" name="first_name" class="form-control" placeholder="First name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Last name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last name">
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone *</label>
                <input type="tel" name="phone" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Address 1 *</label>
                <input type="text" name="address1" class="form-control" placeholder="Enter address" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Address 2</label>
                <input type="text" name="address2" class="form-control" placeholder="Enter address">
              </div>
              <div class="col-md-4">
                <label class="form-label">Country *</label>
                <select class="form-select" name="country" required>
                  <option value="">Select...</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="East Timor">East Timor</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Greece">Greece</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia">Micronesia</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="North Korea">North Korea</option>
                  <option value="North Macedonia">North Macedonia</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestine">Palestine</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option value="Saint Lucia">Saint Lucia</option>
                  <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Korea">South Korea</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Togo">Togo</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City">Vatican City</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">State *</label>
                <input type="text" name="state" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">City *</label>
                <input type="text" name="city" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">ZIP/Postal Code *</label>
                <input type="text" name="zip_code" class="form-control" required>
              </div>
            </div>

              <!-- Cart Summary as Hidden Fields -->
              <input type="hidden" name="subtotal" value="{{ $subtotal }}">
            <input type="hidden" name="discount" value="{{ $discount }}">
            <input type="hidden" name="tax" value="{{ $tax }}">
            <input type="hidden" name="total" value="{{ $total }}">

            <div class="mt-4">
              <button type="submit" class="btn btn-primary w-100">Place Order →</button>
            </div>
          </form>
            @endguest

          
        </div>
      </div>

      <!-- Cart Summary -->
      <div class="col-lg-4">
        <div class="card p-4">
          <h5 class="mb-3">Cart Total</h5>
          <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item d-flex justify-content-between">
              <span>Sub-total</span>
              <strong>${{ number_format($subtotal, 2) }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Shipping</span>
              <span class="text-success">Free</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Discount</span>
              <span>${{ number_format($discount, 2) }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Tax</span>
              <span>${{ number_format($tax, 2) }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between border-top pt-3">
              <strong>Total</strong>
              <strong>${{ number_format($total, 2) }}</strong>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection


<!-- JavaScript to auto-fill address fields -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const radios = document.querySelectorAll('input[name="selected_address_id"]');
  const newAddressFields = document.getElementById('new-address-fields');

  radios.forEach(radio => {
    radio.addEventListener('change', function () {
      if (this.value === 'new') {
        newAddressFields.style.display = 'block';
        newAddressFields.querySelectorAll('input, select').forEach(el => el.value = '');
      } else {
        newAddressFields.style.display = 'block';
        document.querySelector('[name="first_name"]').value = this.dataset.firstname || '';
        document.querySelector('[name="last_name"]').value = this.dataset.lastname || '';
        document.querySelector('[name="phone"]').value = this.dataset.phone || '';
        document.querySelector('[name="email"]').value = this.dataset.email || '';
        document.querySelector('[name="address1"]').value = this.dataset.address1 || '';
        document.querySelector('[name="address2"]').value = this.dataset.address2 || '';
        document.querySelector('[name="country"]').value = this.dataset.country || '';
        document.querySelector('[name="state"]').value = this.dataset.state || '';
        document.querySelector('[name="city"]').value = this.dataset.city || '';
        document.querySelector('[name="zip_code"]').value = this.dataset.zip || '';
      }
    });
  });
});
</script>