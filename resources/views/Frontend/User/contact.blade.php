@extends('Frontend.Layouts.master')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{url('/')}}">@if($language == 'en') @lang('home.home') @else @lang('home.home') @endif</a></li>
            <li><a href="{{url('/contact')}}">@if($language == 'en') @lang('home.contact_us') @else @lang('home.contact_us') @endif</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->



      <section class="shop-grid pb-5 pt-5">
      <div class="container">

<!--         <div class="section-title">
          <h2>SHOP ADDRESS</h2>
        </div> -->

        <div class="row">
          <div class="col-6">
              <section class="message section-bg">
                <div class="container" data-aos="">

                  <div class="section-title">
                    <h2>Contact Us</h2>
                  </div>

                  <form action="{{url('sendMail')}}" method="post" role="form" class="form" data-aos="" data-aos-delay="100" id="">
                    @csrf
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" required>
                      </div>
                    </div>

                    <div class="form-group mt-3">
                      <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                    </div>

                    <div class="text-center mt-4"><button class="btn btn-info" type="submit">Submit Now</button></div>
                  </form>

                </div>
              </section>

          </div>
          <div class="col-6">

                <div class="row">
                    @if($shop_info)
                    @foreach ($shop_info as $v)
                    <div class="col-lg-12 col-md-6 text-center mb-3 mt-3">
                        <div class="shop-image">
                            <img src="{{asset('Backend')}}/img/ShopImage/{{$v->image}}" alt="" class="img-fluid" id="contact-shop-img">
                        </div>
                        <div class="shop-wrap">
                            <a target="_blank" href="{{ url($v->location) }}"><img src="{{asset('Frontend')}}/g-location.png" class="img-fluid" id="g-location"> Click Here For Location</a><br />
                          <h4>@if($language == 'en') {{$v->shop_name}} @else {{$v->shop_name_italic}} @endif</h4>
                          <p>
                            @if($language == 'en') {!! $v->adress !!} @else {!! $v->adress_italic !!} @endif

                          </p>
                        </div>
                    </div>
                    @endforeach
                    @endif
              </div>


          </div>
        </div>

      </div>
  </section>

  </main><!-- End #main -->
@endsection
