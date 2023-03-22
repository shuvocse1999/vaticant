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
            <li class="active">Create Testimonial</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Create Testimonial</h3>
                    </div>
                    <div class="viewlink col-lg-6 col-md-6 col-12">
                        <a href="{{route('testimonial.index')}}" class="btn btn-sm btn-info">View</a>
                    </div>
                </div>

            </div>

            <div class="form-body">

                <form method="post" id="form">
                    <div class="row">

                        <input type="hidden" name="id" value="{{$data->id}}">

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Index No</label><span class="text-danger">*</span>
                                <input class="form-control"  type='number' name='index_no'  id='index_no' value='{{$data->index_no}}' />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="summernote" cols="10" rows="5" class="form-control">{!! $data->description !!}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Description Italic</label>
                                <textarea name="description_italic" id="summernote1" cols="10" rows="5" class="form-control">{!! $data->description_italic !!}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>Client Name</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='client_name'  id='client_name' value='{{$data->client_name}}' />
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>Designation</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='designation'  id='designation' value='{{$data->designation}}' />
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Client Image</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                                </div><input class="form-control"  type='file'  name='image'  id='image' ></div>
                                <img src="{{asset('Backend/img/Testimonial')}}/{{$data->image}}" alt="" style="height: 50px;width:50px;">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>Ratings</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='ratings'  id='ratings' value='{{$data->ratings}}' />
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <label>Status : </label>
                            <label class="switch" style="margin-top:5px;">
                                <input type="checkbox" @if($data->status == 1) checked @endif name="status" value="1" onclick="" class="status" id="status">
                                <span class="slider round"></span>
                            </label>
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
    $("#ratings").on('keyup',function(){
        var ratings = $(this).val();

        if(ratings > 5)
        {
            $("#ratings").val(5);
        }
    })
</script>

<script>

    $('#loading').hide();

    $('#form').submit(function(e){

        e.preventDefault();

        var index_no = $('#index_no').val();

        var client_name = $('#client_name').val();

        var designation = $('#designation').val();


        // alert(slider);

        if(index_no == "")
        {
            $('#index_no').addClass('is-invalid');
        }
        else if(client_name == "")
        {
            $('#client_name').addClass('is-invalid');
        }
        else if(designation == "")
        {
            $('#designation').addClass('is-invalid');
        }
        else
        {
            $.ajax({

                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('updatetestimonial') }}',

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
                            location.href = "{{ url('testimonial')}}";
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
