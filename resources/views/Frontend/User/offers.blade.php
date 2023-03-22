@extends('Frontend.Layouts.master')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{url('/')}}">@if($language == 'en') @lang('home.home') @else @lang('home.home') @endif</a></li>
            <li>@if($language == 'en') @lang('home.offers') @else @lang('home.offers') @endif</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="service">
      <div class="container" data-aos="fade-up">

      <div class="band">

        @if($data)
        @foreach ($data as $v)

        <div>
            <a href="{{url('offer_detail')}}/{{$v->id}}" class="card">
              <div class="thumb" style="background-image: url({{asset('Backend')}}/img/OfferImage/{{$v->image}});"></div>
              <article>
                <h1>@if($language == 'en') {{$v->offer_name}} @else {{$v->offer_name_italic}} @endif</h1>
                <p>@if($language == 'en') {!! Str::limit($v->description,300) !!} @else {!! Str::limit($v->description_italic,300) !!} @endif</p>
              </article>
            </a>
        </div>
        @endforeach
        @endif
        <div class="col-12" style="margin-top:20px;text-align:center;">
            {{ $data->links() }}
          </div>
      </div>


      </div>
    </section>

  </main><!-- End #main -->
@endsection
