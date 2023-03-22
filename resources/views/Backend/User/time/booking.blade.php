@extends('Backend.Layouts.master')
@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="container">
        <!-- Content Header (Page header) -->



        <!-- Main content -->
        <section class="content">
            <div class="form-section">
                <div class="form-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12" id="box-title">
                            <h3 class="">Booking  Information</h3>
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
                                <th>Customer Info.</th>
                                <th>Check In.</th>
                                <th>Check Out</th>
                                <th>Bags</th>
                                <th>Days</th>
                                <th>Total Amount</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @if($data)
                            @foreach ($data as $v)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    {{ $v->name }}<br>
                                    {{ $v->email }}<br>
                                    {{ $v->phone }}<br>
                                    {{ $v->address }}<br>

                                </td>

                                <td>{{ $v->checkin }}  - {{ $v->from_time }}</td>
                                <td>{{ $v->checkout }} - {{ $v->to_time }}</td>
                                <td>{{ $v->bags }} qty</td>
                                <td>
                                   @php
                                    $to_time = strtotime($v->to_time);; // or your date as well
                                    $from_time = strtotime($v->checkout);

                                    $datediff = $from_time - $to_time;

                                    echo round($datediff / (60 * 60 * 24));
                                    @endphp
                                    day
                                </td>
                                <td>
                                    @php
                                    $to_time = strtotime($v->to_time);; // or your date as well
                                    $from_time = strtotime($v->checkout);

                                    $datediff = $from_time - $to_time;

                                    $days =  round($datediff / (60 * 60 * 24));
                                    @endphp
                                    
                                    {{ $days*$v->bags*3 }} €

                                </td>
                                <td>{{ $v->location }}</td>
                                <td>
                                  <a href="{{ url("deletebooking",$v->id) }}" onclick="return confirm('Are u sure?')" class="btn btn-danger">Delete</a>

                                  
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
