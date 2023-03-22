@extends('Frontend.Layouts.master')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{url('/')}}">@if($language == 'en') @lang('home.home') @else @lang('home.home') @endif</a></li>
            <li>@if($language == 'en') {{$data->service_name}} @else {{$data->service_name_italic}} @endif</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="service">
      <div class="container" data-aos="fade-up">

        <div class="section-title ">
          <h2 style="text-align:left; font-size:18px;">@if($language == 'en') {{$data->service_name}} @else {{$data->service_name_italic}} @endif </h2>

        <div class="row" id="img-details">
          <img src="{{asset('Backend')}}/img/ServiceImage/{{$data->image}}" alt="{{$data->alter_image}}">
        </div>
        <br>
          <span style="text-align:left; font-size:14px;">@if($language == 'en') {!! $data->description !!} @else {!! $data->description_italic !!} @endif</span>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection
