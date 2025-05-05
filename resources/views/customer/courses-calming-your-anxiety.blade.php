@extends('layouts.customer.app')
@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Calming your anxiety
                </h2>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
  <div class="container">
    <div class="row align-items-center gy-4">
      <!-- Image Card -->
      <div class="col-lg-4 text-center">
        <div class="bg-white shadow rounded p-3">
          <img src="{{ asset('assets/images/Healthy_Cravings_Series.jpg') }}" alt="Healthy Cravings Series" class="img-fluid rounded">
        </div>
      </div>
      <!-- Text Content -->
      <div class="col-lg-8">
        <p class="fs-5 text-muted mb-3">
          We’re here to help you live your soul’s purpose. But we know that is hard to do if you’re tired, bloated, overweight, or using your precious energy to fight cravings.
        </p>
        <p class="fs-5 text-muted mb-3">
          This series is an easy, low stress way for you to get in better physical shape for summer, lose a few pounds, de-stress about food, or upgrade your eating habits.
        </p>
        <p class="fs-5 text-muted mb-4">
          And without having to rely on raw will power…which is a sure way to take the fun out of success!
        </p>
        <a href="store-search?subcategory_id=15" class="btn px-4 py-2 rounded-pill text-white" style="background-color: #86007d;">
          Sign Me Up <i class="fa-solid fa-arrow-right-long ms-2"></i>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="py-5">
  <div class="container">
    <div class="p-5 rounded-4 text-center shadow" 
         style="background: linear-gradient(to right, #fdf0f3, #f8f4f7);">
      <!-- Heading -->
      <h3 class="fw-semibold mb-4" style="color: #a00074; font-style: italic;">
        In the Healthy Cravings series, you’ll begin to…
      </h3>
      <!-- Benefit Points -->
      <p class="fs-5 text-dark mb-2">Gain freedom from your cravings for unhealthy foods</p>
      <p class="fs-5 text-dark mb-2">Increase your attraction to foods that give you more life energy and serve your higher self</p>
      <p class="fs-5 text-dark mb-2">Make choices that will be loving and caring to yourself without internal pressure or forcing change</p>
      <p class="fs-5 text-dark mb-2">Feel more at ease in your body</p>
      <p class="fs-5 text-dark">Be at peace with food</p>
    </div>
  </div>
</section>
<section class="py-5">
  <div class="container">
    <div class="mx-auto" >
      <p class="fs-5 mb-4">
        This series is about getting into <strong>Vibrational Alignment</strong> with your own capacity to gravitate away from foods and habits that compromise your health, and toward those that will both satisfy you, <strong>AND</strong> keep you vibrant and healthy for years to come!
      </p>

      <p class="fs-5 mb-3">
        In the first class, <strong>Comfort Food Rescue</strong>, you will learn a Vibrancy Protocol designed to help you break addictive eating patterns by connecting more with your own sense of self love, emotional stability, and comfort with your body just as it is.
      </p>

      <p class="fs-5 mb-3">
        The second class, <strong>Joyful Eating</strong>, will help you become more established in relaxed eating practices that nourish your heart, soul and body.
      </p>

      <p class="fs-5 mb-3 text-muted">…..</p>

      <p class="fs-5 mb-3">
        These classes <strong>WON’T</strong> give you menu plans, tell you what to eat or not what to eat, or guilt you into developing healthier habits at the dinner table.
      </p>

      <p class="fs-5 mb-3">
        But they <strong>WILL</strong> help you let go of fruitless efforts to always be trying to just control yourself, and instead clear the conscious and unconscious blocks that have prevented you from developing good eating patterns in the first place.
      </p>

      <p class="fs-5">
        You only get one body, so don’t miss this opportunity to attune to the Powers within you that will serve your best interest when it comes to nurturing yourself with healthy food.
      </p>
    </div>
  </div>
</section>
<section>
  <div class="container text-center">
  <h2 style="font-style: italic;  color: #a1007e; font-weight: 500;">
         Here's what you can look forward to in this 2-class series 
</h2>

    <div style="background-color: #feeefe; border-radius: 20px; margin-top: 2rem; padding: 2rem; display: flex; align-items: center; gap: 1.5rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05);  margin-left: auto; margin-right: auto;">
      
      <div style="flex-shrink: 0;">
        <img src="{{ asset('assets/images/Healthy-Cravings1.png') }}" alt="Comfort Food Rescue" style="width: 160px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
      </div> 
 
      <div style="text-align: left;">
        <p style="font-style: italic; font-size: 1.2rem; color: #a1007e; font-weight: 500;">
          1. Class One: COMFORT FOOD RESCUE
        </p>
        <p style="font-size: 1rem; color: #333;">
          It’s not all about will power. Oftentimes, food cravings are masking underlying emotional imbalances. You will learn a Vibrancy Protocol that will help balance your inner emotional landscape so that you aren’t reaching for food to try to tune out, go numb, or even ground yourself.
        </p>
      </div>

    </div>
    <div style="background-color: #feeefe; border-radius: 20px; margin-top: 2rem; padding: 2rem; display: flex; align-items: center; gap: 1.5rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05);  margin-left: auto; margin-right: auto;">
      
      <div style="flex-shrink: 0;">
        <img src="{{ asset('assets/images/Healthy-Cravings2.png') }}" alt="Comfort Food Rescue" style="width: 160px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
      </div>
      
      <div style="text-align: left;">
        <p style="font-style: italic; font-size: 1.2rem; color: #a1007e; font-weight: 500;">
          1. Class One: COMFORT FOOD RESCUE
        </p>
        <p style="font-size: 1rem; color: #333;">
          It’s not all about will power. Oftentimes, food cravings are masking underlying emotional imbalances. You will learn a Vibrancy Protocol that will help balance your inner emotional landscape so that you aren’t reaching for food to try to tune out, go numb, or even ground yourself.
        </p>
      </div>

    </div>
  </div>
</section>
<section class="py-5">
  <div class="container">
    <div class="row align-items-center gy-4">

      <!-- Text Content -->
      <div class="col-lg-12">
        <p class="fs-5 text-muted mb-3">
          We’re here to help you live your soul’s purpose. But we know that is hard to do if you’re tired, bloated, overweight, or using your precious energy to fight cravings.
        </p>
        <p class="fs-5 text-muted mb-3">
          This series is an easy, low stress way for you to get in better physical shape for summer, lose a few pounds, de-stress about food, or upgrade your eating habits.
        </p>
        <p class="fs-5 text-muted mb-4">
          And without having to rely on raw will power…which is a sure way to take the fun out of success!
        </p>

        <!-- Centered Button -->
        <div class="text-center">
          <a href="store-search?subcategory_id=15" class="btn px-4 py-2 rounded-pill text-white" style="background-color: #86007d;">
            Sign Me Up <i class="fa-solid fa-arrow-right-long ms-2"></i>
          </a>
        </div>

      </div>

    </div>
  </div>
</section>

@endsection