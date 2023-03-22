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
            <li class="active">Update Website Information</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Update Website Information</h3>
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

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Website Title (English)</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='title_en'  id='title_en' value='{{$data->title_en}}' />
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Website Title (Italic)</label>
                                <input class="form-control"  type='text' name='title_italian'  id='title_italian' value='{{$data->title_italian}}' />
                            </div>
                        </div>




                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                {{-- <i class="fa fa-phone"></i> --}}
                                <span>+39</span>
                                </div><input class="form-control"  type='number'  name='phone'  id='phone'  value="{{$data->phone}}"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                                </div><input class="form-control "  type='text'  name='email'  id='email' value="{{$data->email}}"></div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Facebook Link</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fab fa-facebook"></i>
                                </div><input class="form-control"  type='text'  name='facebook'  id='facebook' value="{{$data->facebook}}"></div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Instagram Link</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fab fa-instagram"></i>
                                </div><input class="form-control"  type='text'  name='instagram'  id='instagram' value="{{$data->instagram}}"></div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Twitter Link</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fab fa-twitter"></i>
                                </div><input class="form-control"  type='text'  name='twitter'  id='twitter'  value="{{$data->twitter}}"></div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="form-group">
                                <label>Youtube Link</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fab fa-youtube"></i>
                                </div><input class="form-control"  type='text'  name='youtube'  id='youtube'  value="{{$data->youtube}}"></div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Logo</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                                </div>
                                <input class="form-control"  type='file'  name='logo'  id='logo' >

                            </div>
                            <img src="{{asset('Backend/img')}}/{{$data->logo}}" alt="" class="img-fluid" style="height: 80px;width:80px;">

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Favicon</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                                </div><input class="form-control"  type='file'  name='favicon'  id='favicon' ></div>
                                <img src="{{asset('Backend/img')}}/{{$data->favicon}}" alt="" class="img-fluid" style="height: 80px;width:80px;">
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

        var title_en = $('#title_en').val();


        if(title_en == "")
        {
            $('#title_en').addClass('is-invalid');
        }
        else
        {
            $.ajax({

                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('updatewebsite_information') }}',

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
                        swal("Good job!", "Website Information Created Successfully!", "success");
                        window.setTimeout(function () {
                            location.href = "{{ url('website_information/1/edit')}}";
                        }, 1000);
                    }
                    else
                    {
                        swal("Oops!", "Website Information Created Unsuccessfull!", "error");
                        $('#loading').hide();
                        $('#submit').show();
                    }
                }



            });
        }

    });

</script>

@endsection
