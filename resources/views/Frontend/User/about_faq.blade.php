@extends('Frontend.Layouts.master')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{url('/')}}">@if($language == 'en') @lang('home.home') @else @lang('home.home') @endif</a></li>
            <li><a href="{{url('/about_faq')}}">@if($language == 'en') @lang('home.faq') @else @lang('home.faq') @endif</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Frequently Asked Questioins Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Frequently Asked Questioins</h2>
        </div>

        <ul class="faq-list">

            @if($data)
            @foreach ($data as $v)
            <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{$v->id}}">{{$v->questions}}<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq{{$v->id}}" class="collapse" data-bs-parent=".faq-list">
                <p>
                {!! $v->answer !!}
                </p>
            </div>
            </li>
            @endforeach
            @endif

        </ul>

        </div>
    </section><!-- End Frequently Asked Questioins Section -->


  </main><!-- End #main -->
@endsection
