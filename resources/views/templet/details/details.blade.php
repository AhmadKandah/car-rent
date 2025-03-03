<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="car-details">
				<div class="img rounded" style="background-image: url('{{asset($car->images->first()->path??'' ) }}');"></div>

				<div class="text text-center">
					<span class="subheading">Cheverolet</span>
					<h2>Mercedes Grand Sedan</h2>
				</div>
			</div>
		</div>
	</div>
	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				@foreach ($car->images as $image )

				@include('templet.details.car')
				@endforeach

			</div>
		</div>
		<!-- <div class="d-flex justify-content-center mt-2">
//بحاجة تعديل من اجل باجينيشن
			

		</div> -->
	</section>
	<div class="row">
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Mileage
								<span>{{ $car->mileage }}</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Transmission
								<span>{{ $car->transmission }}</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Seats
								<span>{{ $car->seats }} Adults</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Luggage
								<span>{{ $car->luggage }} Bags</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services">
				<div class="media-body py-md-4">
					<div class="d-flex mb-3 align-items-center">
						<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
						<div class="text">
							<h3 class="heading mb-0 pl-3">
								Fuel
								<span>{{ $car->fuel }}</span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>