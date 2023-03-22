@extends('Frontend.Layouts.master')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="{{url('/')}}">@if($language == 'en') @lang('home.home') @else @lang('home.home') @endif</a></li>
            <li>@if($language == 'en') @lang('home.blog') @else @lang('home.blog') @endif</li>
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
            <a href="{{url('blog_detail')}}/{{$v->id}}" class="card">
              <div class="thumb" style="background-image: url({{asset('Backend')}}/img/BlogImage/{{$v->image}});" alt="{{$v->alter_image}}"></div>
              <article>
                <h1>@if($language == 'en') {{$v->blog_title}} @else {{$v->blog_title_italic}} @endif</h1>
                <p>@if($language == 'en') {!! Str::limit($v->description,300) !!} @else {!! Str::limit($v->description_italic,300) !!} @endif</p>
                @php
                $upload_by = DB::table('users')->where('admin_id',$v->admin_id)->first();
                @endphp
                <span><img src="{{asset('Backend')}}/img/AdminImage/{{$upload_by->image}}" class="blogger"> {{$upload_by->name}}</span>
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
