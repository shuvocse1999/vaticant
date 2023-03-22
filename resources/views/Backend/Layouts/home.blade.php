@extends('Backend.Layouts.master')
@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
        </h1>

                        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
                        <!-- Info boxes -->

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">User</span>
                            <span class="info-box-number"><small>Total Users</small></span>
                            <span class="info-box-number"><small>{{$total_admin}}</small></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-file"></i></span>
                        <div class="info-box-content">
                                <span class="info-box-text">Testimonials</span>
                                <span class="info-box-number"><small>Total Testimonials</small></span>
                                <span class="info-box-number"><small>{{$total_testimonials}}</small></span>
                                                            </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-shop"></i></span>
                        <div class="info-box-content">
                                <span class="info-box-text">Shops</span>
                                <span class="info-box-number"><small>Total Shops</small></span>
                                <span class="info-box-number"><small>{{$total_shops}}</small></span>
                                                            </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-gears"></i></span>
                        <div class="info-box-content">
                                <span class="info-box-text">Services</span>
                                <span class="info-box-number"><small>Total Services</small></span>
                                <span class="info-box-number"><small>{{$total_services}}</small></span>
                                                            </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->


                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-bars"></i></span>
                        <div class="info-box-content">
                                <span class="info-box-text">Blog</span>
                                <span class="info-box-number"><small>Total Blog</small></span>
                                <span class="info-box-number"><small>{{$total_blog}}</small></span>
                                                            </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->


                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-handshake"></i></span>
                        <div class="info-box-content">
                                <span class="info-box-text">Partner</span>
                                <span class="info-box-number"><small>Total Partners</small></span>
                                <span class="info-box-number"><small>{{$total_partner}}</small></span>
                                                            </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->


            </div><!-- /.row -->


            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-envelope"></i>
                    <h3 class="box-title"> Recent Messages</h3><div class="box-tools ">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><!-- /.box-header --><div class="box-body"><div class="row"><form action='https://merchant.sslcommerz.com/' method='get'><input type='hidden' name='request' value='dTFyQWl0cmFuc2FjdGlvbnNNZXJjaGFudDp2aWV3dTFyQWk%3D'>
                            <div class="col-md-12">
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
                                    @if($recent_message)
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($recent_message as $v)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->email}}</td>
                                        <td>{{$v->phone}}</td>
                                        <td>
                                            {!! $v->message !!}
                                        </td>
                                        <td>
                                            <a style="float: left;margin-right:10px;" href="{{url('messagedelete')}}/{{$v->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                </div>
            </div><!-- /.box --></div><!-- /.box --

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


</div><!-- /.col -->
</div><!-- /.row -->
</section>
</div><!-- /.content-wrapper -->
@endsection
