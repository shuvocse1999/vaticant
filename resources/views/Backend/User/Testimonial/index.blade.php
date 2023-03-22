@extends('Backend.Layouts.master')
@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        {{-- <h1>
            User Information
        </h1> --}}

        <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Testimonial Information</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Testimonial Information</h3>
                    </div>
                    <div class="viewlink col-lg-6 col-md-6 col-12">
                        <a href="{{route('testimonial.create')}}" class="btn btn-sm btn-info">Create Testimonial</a>
                    </div>
                </div>

            </div>
            {{-- <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label> --}}
            <div class="form-body">

                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>Index No</th>
                                <th>Description English</th>
                                <th>Description Italic</th>
                                <th>Client Name</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data)
                            @foreach ($data as $v)
                            <tr>
                                <td>{{$v->index_no}}</td>
                                <td>{!! $v->description !!}</td>
                                <td>{!! $v->description_italic !!}</td>
                                <td>{{ $v->client_name }}</td>
                                <td>{{ $v->designation }}</td>
                                <td>
                                    <img src="{{asset('Backend/img/Testimonial')}}/{{$v->image}}" alt="" style="height: 50px;width:50px;">
                                </td>
                                <td>
                                    @if($v->status == 1)
                                    <label class="switch">
                                        <input type="checkbox" checked onclick="testimonialStatusChange({{$v->id}})" class="status">
                                        <span class="slider round"></span>
                                    </label>
                                      @else
                                      <label class="switch">
                                        <input type="checkbox" onclick="testimonialStatusChange({{$v->id}})" class="status">
                                        <span class="slider round"></span>
                                        </label>
                                      @endif
                                </td>
                                <td>
                                    <a style="float: left;margin-right:10px;" href="{{route('testimonial.edit',$v->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('testimonial.destroy',$v->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are Your Sure?')" type="submit" class="btn-sm btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </section>
</div>


</div>
</div>
</section>
</div>


<script>

    function testimonialStatusChange(id)
    {
        // alert(id);




        $.ajax({

            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ url('testimonialStatusChange') }}',

            type : 'POST',

            data : {id},

            success : function(data)
            {
                if(data == 1)
                {
                    location.reload();
                }
                else{
                    location.reload();
                }
            }

        });


    }

</script>


<script>

    function galleryStatusChange(id)
    {
        // alert(id);




        $.ajax({

            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ url('galleryStatusChange') }}',

            type : 'POST',

            data : {id},

            success : function(data)
            {
                if(data == 1)
                {
                    location.reload();
                }
                else{
                    location.reload();
                }
            }

        });


    }

</script>


@endsection
