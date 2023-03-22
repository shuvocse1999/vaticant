@extends('Frontend.Layouts.master')
@section('body')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->

        @if($slider)
        @foreach($slider as $v)
        <div class="carousel-item active" style="background-image: url({{asset('Backend')}}/img/PhotoGallery/{{$v->image}})">
        </div>
        @endforeach
        @endif

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Our Service Section ======= -->
    <section class="service">
      <div class="container" data-aos="">

        <div class="section-title">
          <h2>@if($language == 'en') @lang('home.our_services') @else @lang('home.our_services') @endif</h2>
        </div>

        <div class="row">

        @if($service)
        @foreach ($service as $v)
        <div class="col-lg-3 col-md-6">
            <div class="box" data-aos="" data-aos-delay="100">
                @php
                $path = base_path().'/Backend/img/ServiceImage/'.$v->image;
                @endphp
             <div class="server-img">
            <a href="{{url('service_detail')}}/{{$v->id}}">
                @if(file_exists($path))
                <img src="{{asset('Backend')}}/img/ServiceImage/{{$v->image}}" alt="{{$v->alter_image}}">
                @else
                <img src="{{asset('Backend/img')}}/{{$website_info->logo}}" style="opacity: 0.2">
                @endif
            </a>
             </div>
              <div class="btn-wrap">
                <ul>
                  <li>@if($language == 'en') {{$v->service_name}} @else {{$v->service_name_italic}} @endif</li>
                </ul>
                <a href="{{url('service_detail')}}/{{$v->id}}" class="btn-buy w-100">@if($language == 'en') @lang('home.details') @else @lang('home.details') @endif</a>
              </div>
            </div>
          </div>
        @endforeach
        @endif
        </div>

      </div>
    </section><!-- End Our Service Section -->




    <!-- Blog Section -->

    <section>
        <div class="section-title">
          <h2>@if($language == 'en') @lang('home.blog') @else @lang('home.blog') @endif </h2>
        </div>

        <div class="band">

          @if($blog)
          @foreach($blog as $v)
          <div class="item-4">
            <a href="{{url('/blog_detail')}}/{{$v->id}}" class="card">
                @php
                $path = base_path().'/Backend/img/BlogImage/'.$v->image;
                @endphp
                @if(file_exists($path))
              <div class="thumb" style="background-image: url({{asset('Backend')}}/img/BlogImage/{{$v->image}});" alt="{{$v->alter_image}}"></div>
              @else
              <div class="thumb" style="background-image: url({{asset('Backend/img')}}/{{$website_info->logo}});opacity:0.2;"></div>
              @endif
              <article>
                <h1>@if($language == 'en') {{$v->blog_title}} @else {{$v->blog_title_italic}} @endif</h1>
              </article>
            </a>
          </div>
          @endforeach
          @endif
        </div>
    </section>

    <!-- End Blog Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="">

        <div class="section-title">
          <h2>@if($language == 'en') @lang('home.testimonials') @else @lang('home.testimonials') @endif</h2>

        </div>

        <div class="testimonials-slider swiper" data-aos="" data-aos-delay="100">
          <div class="swiper-wrapper">

            @if($testimonial)
            @foreach ($testimonial as $v)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  @if($language == 'en') {!! $v->description !!} @else {!! $v->description_italic !!} @endif
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('Backend')}}/img/Testimonial/{{$v->image}}" class="testimonial-img" alt="" style="height: 100px;width:100px;">
                <h3>{{$v->client_name}}</h3>
                <h4>{{$v->designation}}  </h4>
                <div class="rating-wrap">
                @php
                for ($i=1; $i <= $v->ratings ; $i++)
                {
                    echo "<i class='fa fa-star first-star' id='rating_star'></i>";
                }
                @endphp
                </div>
              </div>
            </div>
            @endforeach
            @endif

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->



    <!-- Footer Slider Section Starts -->
    <section id="footer" class="footer">
      <div class="section-title">
        <h2>@if($language == 'en') @lang('home.our_partner') @else @lang('home.our_partner') @endif </h2>
      </div>
      <div class="container" data-aos="">

        <div class="footer-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @if($partner)
            @foreach ($partner as $v)
            <div class="swiper-slide"><img src="{{asset('Backend')}}/img/PartnerImage/{{$v->image}}" class="img-fluid" alt=""></div>
            @endforeach
            @endif

          </div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <section class="shop-grid pb-5 pt-5">
      <div class="container">

        <div class="section-title">
          <h2>@if($language == 'en') @lang('home.shop_adress') @else @lang('home.shop_adress') @endif</h2>
        </div>

          <div class="row">

              @if ($shop)
                  @foreach ($shop as $v)
                  <div class="col-lg-4 col-md-6 text-center mb-3">
                      <div class="shop-wrap">
                        <div class="shop-image">
                            @php
                            $path = base_path().'/Backend/img/ShopImage/'.$v->image;
                            @endphp
                            @if(file_exists($path))
                            <img src="{{asset('Backend')}}/img/ShopImage/{{$v->image}}" alt="" class="img-fluid">
                            @else
                                <img src="{{asset('Backend/img')}}/{{$website_info->logo}}" style="opacity: 0.2" class="img-fluid">
                            @endif
                        </div>
                        <h4>@if($language == 'en') {{$v->shop_name}} @else {{$v->shop_name_italic}} @endif</h4>
                        <p>
                            @if($language == 'en') {{$v->adress}} @else {{$v->adress_italic}} @endif
                        </p>
                        <a target="_blank" href="{{ url($v->location) }}"><img src="{{asset('Frontend')}}/g-location.png" class="img-fluid" id="g-location"> Click Here For Location</a><br />
                          {!! $v->map !!}
                      </div>
                  </div>
                  @endforeach
              @endif

          </div>
      </div>
  </section>

  </main><!-- End #main -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="">

        <div class="section-title">
          <h2>@if($language == 'en') @lang('home.gallery') @else @lang('home.gallery') @endif</h2>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">

            @if ($gallery)
            @foreach ($gallery as $v)
            <div class="swiper-slide"><a href="{{asset('Backend')}}/img/PhotoGallery/{{$v->image}}"><img src="{{asset('Backend')}}/img/PhotoGallery/{{$v->image}}" class="img-fluid" alt="" id="gallerySlider"></a></div>
            @endforeach
            @endif


          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->


    @endsection
