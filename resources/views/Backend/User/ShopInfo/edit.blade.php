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
            <li class="active">Shop Information</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Shop Information</h3>
                    </div>
                    <div class="viewlink col-lg-6 col-md-6 col-12">
                        <a href="{{route('shop_info.index')}}" class="btn btn-sm btn-info">View</a>
                    </div>
                </div>

            </div>

            <div class="form-body">

                <form method="post" id="form">
                    <div class="row">

                        <input type="hidden" value="{{$data->id}}" name="id">

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Index No</label><span class="text-danger">*</span>
                                <input class="form-control"  type='number' name='index_no'  id='index_no' value='{{$data->index_no}}' />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Shop Name</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='shop_name'  id='shop_name' value='{{$data->shop_name}}' />
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Shop Name Italic</label>
                                <input class="form-control"  type='text' name='shop_name_italic'  id='shop_name_italic' value='{{$data->shop_name_italic}}' />
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control"  type='email' name='email'  id='email' value='{{$data->email}}' />
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control"  type='number' name='phone'  id='phone' value='{{$data->phone}}' />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Adress</label>
                                <textarea name="adress" id="summernote" cols="10" rows="5" class="form-control">{!! $data->adress !!}</textarea>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Adress Italic</label>
                                <textarea name="adress_italic" id="summernote1" cols="10" rows="5" class="form-control">{!! $data->adress_italic !!}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Map Location</label>
                                <textarea name="map_location" id="" cols="10" rows="5" class="form-control">{!! $data->map !!}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Location</label>
                                <textarea name="location" id="" cols="10" rows="5" class="form-control">{!! $data->location !!}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                                </div><input class="form-control"  type='file'  name='image'  id='image' ></div>
                                <img src="{{asset('Backend/img/ShopImage')}}/{{$data->image}}" alt="" class="img-fluid" style="height: 80px;">
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

        var index_no = $('#index_no').val();

        var shop_name = $('#shop_name').val();


        // alert(slider);

        if(index_no == "")
        {
            $('#index_no').addClass('is-invalid');
        }
        else if(shop_name == "")
        {
            $('#shop_name').addClass('is-invalid');
        }
        else
        {
            $.ajax({

                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('updateshop_info') }}',

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
                        swal("Good job!", "Your Picture Successfully!", "success");
                        window.setTimeout(function () {
                            location.href = "{{ url('shop_info')}}";
                        }, 1000);
                    }
                    else
                    {
                        swal("Oops!", "Your Picture Unsuccessfull!", "error");
                        $('#loading').hide();
                        $('#submit').show();
                    }
                }



            });
        }

    });

</script>

@endsection
