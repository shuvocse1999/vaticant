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
                        <a href="{{route('create_user.index')}}" class="btn btn-sm btn-info">View User</a>
                    </div>
                </div>

            </div>

            <div class="form-body">

                <form method="post" id="form">
                    <div class="row">
                        {{-- <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                                </div><input class="form-control "  type='text'  name='name'  id='startDateTime' ></div>
                            </div>
                        </div> --}}

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>User Type</label><span class="text-danger">*</span>
                                <select class="form-control" name="user_type" id="user_type">
                                    <option value="">Select One</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Super Admin">Main Admin</option>
                                    <option value="Super Admin">Sub Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Name</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='name'  id='name' value='' />
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Fathers Name</label>
                                <input class="form-control"  type='text' name='fathers_name'  id='fathers_name' value='' />
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Mothers Name</label>
                                <input class="form-control"  type='text' name='mothers_name'  id='mothers_name' value='' />
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Email</label><span class="text-danger">*</span>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                                </div><input class="form-control "  type='text'  name='email'  id='email' ></div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                {{-- <i class="fa fa-phone"></i> --}}
                                <span>+88</span>
                                </div><input class="form-control"  type='number'  name='phone'  id='phone' ></div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Password</label><span class="text-danger">*</span>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-key"></i>
                                </div><input class="form-control"  type='text'  name='password'  id='password' ></div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Designation</label>
                                <input class="form-control"  type='text' name='designation'  id='designation' value='' />
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" id="" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                                </div><input class="form-control"  type='file'  name='image'  id='image' ></div>
                            </div>
                        </div>

                        <div class="col-lg-12" style="text-align: right;">
                            <input type="submit" class="btn btn-info btn-sm" value="Save" id="submit">
                            <input type="button" class="btn btn-info btn-sm" value="Loading...." id="loading">
                        </div>

                    </div>
                </form>

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

    $('#loading').hide();

    $('#form').submit(function(e){

        e.preventDefault();

        var user_type = $('#user_type').val();

        var name = $('#name').val();

        var email = $('#email').val();

        var password = $('#password').val();

        if(user_type == "")
        {
            $('#user_type').addClass('is-invalid');
        }
        else if(name == "")
        {
            $('#name').addClass('is-invalid');
        }
        else if(email == "")
        {
            $('#email').addClass('is-invalid');
        }
        else if(password == "")
        {
            $('#password').addClass('is-invalid');
        }
        else
        {
            $.ajax({

                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ route('create_user.store') }}',

                type : 'POST',

                data : new FormData(this),

                cache:false,

                contentType: false,

                processData: false,

                beforeSend : function()
                {
                    $('#loading').show();
                    $('#submit').hide();
                },

                success : function(data)
                {
                    // alert(data);
                    if(data == 1)
                    {
                        $('#form').trigger('reset');
                        $('#loading').hide();
                        $('#submit').show();
                        swal("Good job!", "Admin Created Successfully!", "success");
                        window.setTimeout(function () {
                            location.href = "{{ url('create_user')}}";
                        }, 1000);
                    }
                    else if(data == 2)
                    {
                        $('#loading').hide();
                        $('#submit').show();
                        swal("Oops!", "This Email Is Already Taken!", "warning");
                    }
                    else
                    {
                        swal("Oops!", "Admin Created Unsuccessfull!", "error");
                        $('#loading').hide();
                        $('#submit').show();
                    }
                }



            });
        }

    });

</script>

@endsection
