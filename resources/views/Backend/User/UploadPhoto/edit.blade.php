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
            <li class="active">Upload Photo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Upload Photo</h3>
                    </div>
                    <div class="viewlink col-lg-6 col-md-6 col-12">
                        <a href="{{route('upload_photo.index')}}" class="btn btn-sm btn-info">View Photos</a>
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
                                <input class="form-control"  type='text' name='index_no'  id='index_no' value='{{$data->index_no}}' />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Title</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='title'  id='title' value='{{$data->title}}' />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Title Italic</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='title_italic'  id='title_italic' value='{{$data->title_italic}}' />
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
                                <textarea name="description_italic" id="summernote1" cols="10" rows="5" class="form-control">{!! $data->description !!}</textarea>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                                </div>
                                <input class="form-control"  type='file'  name='image'  id='image' >
                            </div>
                            <img src="{{asset('Backend/img/PhotoGallery')}}/{{$data->image}}" alt="" style="height: 100px;">
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <label>Slider : </label>
                            <label class="switch" style="margin-top:5px;">
                                <input @if($data->slider == 1) checked @endif type="checkbox" name="slider" value="1" onclick="" class="status" id="slider">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="col-lg-12 ">
                            <label>Photo Gallery : </label>
                            <label class="switch" style="margin-top:5px;">
                                <input @if($data->photo_gallery == 1) checked @endif type="checkbox" name="photo_gallery" value="1" onclick="" class="status" id="photo_gallery">
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

    $('#loading').hide();

    $('#form').submit(function(e){

        e.preventDefault();

        var title = $('#title').val();

        var slider = $('#slider').val();

        var photo_gallery = $('#photo_gallery').val();

        // alert(slider);

        if(title == "")
        {
            $('#title').addClass('is-invalid');
        }
        else
        {
            $.ajax({

                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('updateuploadphoto') }}',

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
                            location.href = "{{ url('upload_photo')}}";
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
