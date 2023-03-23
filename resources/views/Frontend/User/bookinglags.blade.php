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
					<span>Additional Information</span><hr>
					<p style="font-size: 13px;">Looking for a place to drop your bags? Our luggage storage close to Piazza Cavour and Castel Sant'Angelo is the perfect place! Experience a new of traveling, hands-free.
						We created a service to make traveling easier for all you travelers out there! Never let your bags stop you from walking around the city drop them off with our lovely partners all around the world who are waiting for you!<br>
						Our service makes it easy for you to book with us. Find us on our Website or through our App. Our geolocator will help you choose the closest Radical partner to you. Choose one & drop your bags off. Simple is the word.<br>
					
					</p><hr>
					<span>Opening hours:</span><br>
					<strong>Today: 9:00 AM - 6:00 PM</strong><hr>
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
										<input type="number" name="amount" class="form-control bg-light" id="amount" readonly="">
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
