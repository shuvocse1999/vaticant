@extends('Frontend.Layouts.master')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{url('/')}}">@if($language == 'en') @lang('home.home') @else @lang('home.home') @endif</a></li>
            <li>@if($language == 'en') {{$data->offer_name}} @else {{$data->offer_name_italic}} @endif</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="service">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>@if($language == 'en') {{$data->offer_name}} @else {{$data->offer_name_italic}} @endif</h2>

        <div class="row" id="img-details">
          <img src="{{asset('Backend')}}/img/OfferImage/{{$data->image}}">
        </div>
        <br>
        <p>@if($language == 'en') {!! $data->description !!} @else {!! $data->description_italic !!} @endif</p>
        </div>
      </div>
    </section>

  </main>
  @endsection
