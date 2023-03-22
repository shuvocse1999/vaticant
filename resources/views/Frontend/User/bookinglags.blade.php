@extends('Frontend.Layouts.master')
@section('body')


<main id="main" style="max-width: 900px; margin: 0 auto;">
	<!-- ======= Breadcrumbs Section ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<ol>
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('/bookinglags')}}">Booking</a></li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs Section -->


	<div class="container mt-5 mb-5" data-aos="fade-up">

		<div class="row">
			<div class="col-md-5">
				<div class="border p-4">
					<span>Luggage Storage Piazza Cavour</span><br><br>
					<strong>Locations</strong>
					@if(isset($shop))
					@foreach($shop as $v)
					<div class="mt-3">
						{!! $v->map !!}<br><br>

						<center><strong>@if($language == 'en') {{$v->shop_name}} @else {{$v->shop_name_italic}} @endif</strong></center>
					</div>
					@endforeach
					@endif
				</div>
			</div>

			<div class="col-md-7">
				<div class="">

					<b>Book for € 3 bag/day</b>

					<form method="post" action="{{ url('bookingbagsnow') }}">
						@csrf

						<div class="col-md-12 mt-4">
							<div class="bg-light p-4 rounded">
								<div class="row">
									<div class="form-group col-md-6">
										<label>CHECK-IN</label><br>
										<input type="date" name="checkin" class="form-control" id="checkin" required="">
									</div>

									<div class="form-group col-md-6">
										<label>CHECKOUT</label><br>
										<input type="date" name="checkout" class="form-control" id="checkout" required="" onchange="return daychange()">
									</div>

									<div class="form-group col-md-6 mt-3">									
										<select class="form-control" name="from_time" required="">
											@if(isset($time))
											@foreach($time as $t)
											<option value="{{ $t->time }}">{{ $t->time }}</option>
											@endforeach
											@endif
										</select>
									</div>


									<div class="form-group col-md-6 mt-3">									
										<select class="form-control" name="to_time" required="">
											@if(isset($time))
											@foreach($time as $t)
											<option value="{{ $t->time }}">{{ $t->time }}</option>
											@endforeach
											@endif
										</select>
									</div>



									<div class="form-group col-md-12 mt-3">	
										<label>Location</label><br>								
										<select class="form-control" name="location" required="">
											@if(isset($shop))
											@foreach($shop as $t)
											<option value="@if($language == 'en') {{$v->adress}} @else {{$v->adress_italic}} @endif">@if($language == 'en') {{$v->adress}} @else {{$v->adress_italic}} @endif</option>
											@endforeach
											@endif
										</select>
									</div>


									<div class="form-group col-md-4 mt-3 mb-4">									
										<label>Bags</label><br>
										<input type="number" value="1" name="bags" id="bags" class="form-control" onkeyup="return daychange()" required="">
									</div>


									<div class="form-group col-md-8 mt-3 mb-4">									
										<label>Amount (€)</label><br>
										<input type="number" class="form-control bg-light" id="amount" readonly="">
									</div>



									<strong>Personal Information</strong>

									<div class="form-group col-md-12 mt-3">									
										<label>Name</label><br>
										<input type="text" value="" name="name" class="form-control" required="">
									</div>

									<div class="form-group col-md-6 mt-3">									
										<label>Email</label><br>
										<input type="text" value="" name="email" class="form-control">
									</div>


									<div class="form-group col-md-6 mt-3">									
										<label>Phone</label><br>
										<input type="text" value="" name="phone" class="form-control" required="">
									</div>

									<div class="form-group col-md-12 mt-3">									
										<label>Address</label><br>
										<textarea rows="3" class="form-control" name="address"></textarea>
									</div>



									<div class="form-group col-md-12 mt-4">									
										<button type="submit" class="btn btn-success w-100">Book Now</button>
									</div>


								</div>
							</div>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>

</div>


</main><!-- End #main -->


<script>  



</script> 


<script type="text/javascript">
	

	function daychange(){

		var date1 = $("#checkin").val();
		var date2 = $("#checkout").val();
		var bags  = $("#bags").val();

		var d1 = new Date(date1);   
		var d2 = new Date(date2);   

		var diff = d2.getTime() - d1.getTime();   

		var daydiff = diff / (1000 * 60 * 60 * 24);   


		$("#amount").val(bags*daydiff*3);

		



	}

</script>


<style type="text/css">
	input{
		height: 45px!important;
		box-shadow: none!important;
	}
	select{
		height: 45px!important;
		box-shadow: none!important;

	}
	label{
		font-size: 13px;
	}
</style>
@endsection
