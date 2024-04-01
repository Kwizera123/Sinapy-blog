@extends('layouts.master_home')
@include('layouts.body.slider')

@section('home_content')
  <!-- ======= About Us Section ======= -->
  <section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</strong></h2>
      </div>

      <div class="row content">
        <div class="col-lg-6" data-aos="fade-right">
          <h2>{{ $abouts->title }}</h2>
          <h3>{{ $abouts->short_dis }}</h3>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
          <p>
            {{ $abouts->long_dis }}
          </p>
          {{-- <ul>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
          </ul> --}}
          {{-- <p class="font-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p> --}}
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>{{$homeservice->title}}</strong></h2>
        <p>{{$homeservice->short_dis}}</p>
      </div>

      
      <div class="row">
        @foreach($services as $ser)
        
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box iconbox-blue">
             <img src="{{ $ser->image }}" class="img-fluid e" alt="" height="50" width="50"/>            
            <h4><a href="">{{ $ser->item }}</a></h4>
            <p>{{ $ser->item_dis }}</p>
          </div>
        </div>
        @endforeach
      </div>
      
    </div>
  </section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
      </div>

      <div class="row" data-aos="fade-up">
        <div class="col-lg-12 d-flex justify-content-center">
          
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up">
@foreach($images as $img)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <img src="{{ $img->image }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 1</h4>
            <p>App</p>
            <a href="{{ $img->image }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"></a>
          </div>
        </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Our Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Brands</h2>
      </div>

      <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

        @foreach($brands as $brand)
        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="{{ $brand->brand_image }}" class="img-fluid" alt="" height="500" width="100" />
          </div>
        </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Our Clients Section -->

@endsection