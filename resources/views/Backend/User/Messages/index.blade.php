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
            <li class="active">All Messages</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">All Messages</h3>
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
                            <th>Messages</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($messages)
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($messages as $v)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->email}}</td>
                            <td>{{$v->phone}}</td>
                            <td>
                                {!! $v->message !!}
                            </td>
                            <td>
                                <a onclick="return confirm('Are You Sure')" style="float: left;margin-right:10px;" href="{{url('messagedelete')}}/{{$v->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
