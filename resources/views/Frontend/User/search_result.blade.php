@if($data)
@foreach($data as $v)
<div class="search-result-single mt-2" style="border-bottom:1px solid lightgray;">
    <a href="{{url('service_detail')}}/{{$v->id}}">
        <div class="row">
            <div class="col-3 service-image">
                <img src="{{asset('Backend')}}/img/ServiceImage/{{$v->image}}" class="img-fluid" style="max-width:100px;">
            </div>
            <div class="col-9 text">
                <b>@if($language == 'en') {{$v->service_name}} @else {{$v->service_name_italic}} @endif</b>
            </div>
        </div>
    </a>
</div>
@endforeach
@endif