@extends('Backend.Layouts.master')
@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="container">
    <!-- Content Header (Page header) -->

    <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Time Information</h3>
                    </div>
                   
                </div>

            </div>

            <div class="form-body">

                <form method="post" action="{{ url("inserttime") }}">
                    @csrf
                    <div class="row">

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>SL.</label><span class="text-danger">*</span>
                                <input class="form-control"  type='number' name='sl'  id='sl' />
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>Time</label><span class="text-danger">*</span>
                                <input class="form-control"  type='text' name='time'  id='time' />
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-info btn-sm" value="Save" id="submit">
                           
                        </div>

                    </div>
                </form>

                </div>
            </div>






    <!-- Main content -->
    <section class="content">
        <div class="form-section">
            <div class="form-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" id="box-title">
                        <h3 class="">Time Information</h3>
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
                                <th>SL.</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data)
                            @foreach ($data as $v)
                            <tr>
                                <td>{{$v->sl}}</td>
                                <td>{{ $v->time }}</td>
                                <td>
                                  <a href="{{ url("deletetime",$v->id) }}" class="btn btn-danger">Delete</a>
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
</div>



@endsection
