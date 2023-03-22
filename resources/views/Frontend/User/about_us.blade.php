@extends('Frontend.Layouts.master')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{url('/')}}">@if($language == 'en') @lang('home.home') @else @lang('home.home') @endif</a></li>
            <li><a href="{{url('/aboutUs')}}">@if($language == 'en') @lang('home.about_us') @else @lang('home.about_us') @endif</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="service">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>@if($language == 'en') @lang('home.about_us') @else @lang('home.about_us') @endif</h2>
          @if($language == 'en') {!! $data->description !!} @else {!! $data->description_italic !!} @endif
        </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection
