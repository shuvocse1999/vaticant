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
			
			<div class="col-md-7">
				<div class="">


					<form method="post" action="{{ url('bookingbagsnowconfirm') }}">
						@csrf

						<div class="col-md-12 mt-4">
							<div class="bg-light p-4 rounded">
								<div class="row">
									


									<strong>Personal Information</strong>

									<div class="form-group col-md-12 mt-3">									
										<label>Name</label><br>
										<input type="text" value="" name="name" class="form-control" required="">
									</div>

									<div class="form-group col-md-12 mt-3">									
										<label>Email</label><br>
										<input type="text" value="" name="email" class="form-control">
									</div>


									<div class="form-group col-md-12 mt-3">									
										<label>Phone</label><br>
										<input type="text" value="" name="phone" class="form-control" required="">
									</div>

									<div class="form-group col-md-12 mt-3">									
										<label>Address</label><br>
										<textarea rows="5" class="form-control" name="address"></textarea>
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


			<div class="col-md-5 mt-4">
				<div class="border p-4 bg-light">

					<b>Order Summary</b><hr>
					<span style="font-size: 14px;"><b>Bags:</b> {{ $draftbooking->bags }} qty</span><br>
					<span style="font-size: 14px;"><b>Date:</b> {{ $draftbooking->checkin }} To {{ $draftbooking->checkout }}</span><br>
					<span style="font-size: 14px;"><b>Location:</b> {{ $draftbooking->location }}</span><hr>
					<div class="row">
						<div class="col-md-6">
							<b>Total Amount:</b>
						</div>

						<div class="col-md-6" style="text-align: right;">
							<b>{{ $draftbooking->amount }} €</b>
						</div>
					</div>
	
					
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
