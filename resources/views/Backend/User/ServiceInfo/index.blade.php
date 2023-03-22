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
            <li class="active">Service Information</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Service Information</h3>
                    </div>
                    <div class="viewlink col-lg-6 col-md-6 col-12">
                        <a href="{{route('service_info.create')}}" class="btn btn-sm btn-info">Create Service</a>
                    </div>
                </div>

            </div>
            {{-- <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label> --}}
            <div class="form-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>Index No</th>
                                <th>Service Name</th>
                                <th>Service Name Italic</th>
                                
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
                                <td>{{ $v->service_name }}</td>
                                <td>{{ $v->service_name_italic }}</td>
                                
                                <td>
                                    <img src="{{asset('Backend/img/ServiceImage')}}/{{$v->image}}" alt="" class="img-fluid" style="height: 80px;">
                                </td>
                                <td>
                                    @if($v->status == 1)
                                    <label class="switch">
                                        <input type="checkbox" checked onclick="serviceStatusChange({{$v->id}})" class="status">
                                        <span class="slider round"></span>
                                    </label>
                                      @else
                                      <label class="switch">
                                        <input type="checkbox" onclick="serviceStatusChange({{$v->id}})" class="status">
                                        <span class="slider round"></span>
                                        </label>
                                      @endif
                                </td>
                                <td>
                                    <a style="float: left;margin-right:10px;" href="{{route('service_info.edit',$v->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('service_info.destroy',$v->id) }}" method="post">
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

        </div>
    </section>
</div>


</div>
</div>
</section>
</div>


<script>

    function serviceStatusChange(id)
    {
        // alert(id);




        $.ajax({

            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ url('serviceStatusChange') }}',

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
