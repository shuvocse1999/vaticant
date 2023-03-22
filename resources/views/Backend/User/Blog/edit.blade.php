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
            <li class="active">Blog Information</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Blog Information</h3>
                    </div>
                    <div class="viewlink col-lg-6 col-md-6 col-12">
                        <a href="{{route('blog_info.index')}}" class="btn btn-sm btn-info">View</a>
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
                                <label>Blog Title</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='blog_title'  id='blog_title' value='{{$data->blog_title}}' />
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Blog Title Italic</label>
                                <input class="form-control"  type='text' name='blog_title_italic'  id='blog_title_italic' value='{{$data->blog_title_italic}}' />
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
                        
                        <div class="col-12" style="text-align:center;">
                            <h3>Seo Section</h3>
                        </div>
                        
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Meta Tag</label>
                                <input class="form-control"  type='text' name='meta_tag'  id='' value='{{$data->meta_tag}}' />
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input class="form-control"  type='text' name='meta_title'  id='' value='{{$data->meta_title}}' />
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" id="" cols="10" rows="5" class="form-control">{!! $data->meta_description !!}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                                </div><input class="form-control"  type='file'  name='image'  id='image' ></div>
                                <img src="{{asset('Backend/img/BlogImage')}}/{{$data->image}}" alt="" class="img-fluid" style="height: 80px;">
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Alter Image</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-image"></i>
                                </div><input class="form-control"  type='text'  name='alter_image'  id='alter_image' value="{{$data->alter_image}}"></div>
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

        var blog_title = $('#blog_title').val();



        // alert(slider);

        if(index_no == "")
        {
            $('#index_no').addClass('is-invalid');
        }
        else if(blog_title == "")
        {
            $('#blog_title').addClass('is-invalid');
        }
        else
        {
            $.ajax({

                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('updatebloginfo') }}',

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
                            location.href = "{{ url('blog_info')}}";
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
