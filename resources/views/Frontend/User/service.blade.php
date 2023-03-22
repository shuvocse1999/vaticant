@extends('Frontend.Layouts.master')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{url('/')}}">@if($language == 'en') @lang('home.home') @else @lang('home.home') @endif</a></li>
            <li><a href="{{url('/service')}}">@if($language == 'en') @lang('home.services') @else @lang('home.services') @endif</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Our Service Section ======= -->
    <section class="service">
      <div class="container" data-aos="">

        <div class="section-title">
          <h2>@if($language == 'en') @lang('home.our_services') @else @lang('home.our_services') @endif</h2>
        </div>

        <div class="row">

          @if($data)
          @foreach ($data as $v)
          <div class="col-lg-3 col-md-6">
            <div class="box" data-aos="" data-aos-delay="100">
             <div class="server-img">
              <a href="{{url('/serviceDetail')}}/{{$v->id}}"><img src="{{asset('Backend')}}/img/ServiceImage/{{$v->image}}" alt="{{$v->alter_image}}"></a>
             </div>
              <div class="btn-wrap">
                <ul>
                  <li>@if($language == 'en') {{$v->service_name}} @else {{$v->service_name_italic}} @endif</li>
                </ul>
                <a href="{{url('/serviceDetail')}}/{{$v->id}}" class="btn-buy">@if($language == 'en') @lang('home.details') @else @lang('home.details') @endif</a>
              </div>
            </div>
          </div>
          @endforeach
          @endif

          <div class="col-12" style="margin-top:20px;text-align:center;">
            {{ $data->links() }}
          </div>

        </div>

      </div>
    </section><!-- End Our Service Section -->

  </main><!-- End #main -->
@endsection
