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
            <li class="active">User Information</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">User Information</h3>
                    </div>
                    <div class="viewlink col-lg-6 col-md-6 col-12">
                        <a href="{{route('create_user.create')}}" class="btn btn-sm btn-info">Create User</a>
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
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data)
                            @foreach ($data as $v)
                            <tr>
                                <td>{{$v->admin_id}}</td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->email}}</td>
                                <td>{{$v->phone}}</td>
                                <td>
                                    <img src="{{asset('Backend/img/AdminImage')}}/{{$v->image}}" alt="" style="height: 50px;width:50px;border-radius:100%">
                                </td>
                                <td>
                                    @if($v->status == 1)
                                    <label class="switch">
                                        <input type="checkbox" checked onclick="statusChange({{$v->id}})" class="status">
                                        <span class="slider round"></span>
                                    </label>
                                      @else
                                      <label class="switch">
                                        <input type="checkbox" onclick="statusChange({{$v->id}})" class="status">
                                        <span class="slider round"></span>
                                        </label>
                                      @endif
                                </td>
                                <td>
                                    <a style="float: left;margin-right:10px;" href="{{route('create_user.edit',$v->admin_id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('create_user.destroy',$v->admin_id) }}" method="post">
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

    function statusChange(admin_id)
    {
        // alert(id);




        $.ajax({

            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ url('adminStatusChange') }}',

            type : 'POST',

            data : {admin_id},

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

    // $(document).on('click','.status',function(){

    //     var admin_id = $('.status').val();

    //     alert(admin_id);

    //     // $.ajax({

    //     //     headers : {
    //     //         'X-CSRF-TOKEN' : '{{ csrf_token() }}'
    //     //     },

    //     //     url : '{{ url('adminStatusChange') }}',

    //     //     type : 'POST',

    //     //     data : {admin_id},

    //     //     success : function(data)
    //     //     {
    //     //         if(data == 1)
    //     //         {
    //     //             location.reload();
    //     //         }
    //     //         else{
    //     //             location.reload();
    //     //         }
    //     //     }

    //     // });


    // });

</script>


@endsection
