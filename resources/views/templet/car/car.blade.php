<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url({{ asset($car->images->first()->path) }});">
    					</div>
					<div class="text">
    <h2 class="mb-0"><a href="car-single.html">{{ $car->model }}</a></h2>
    <div class="d-flex flex-column mb-3">
        <span class="cat">{{ $car->brand }}</span>
        <div class="price"> {{ $car->price_per_day }} <span>/day</span></div>
        <div class="price"> {{ $car->price_per_month }} <span>/month</span></div>
        <div class="price"> {{ $car->price_per_hour }} <span>/hour</span></div>
    </div>
    <p class="d-flex mb-0 d-block">
        <a href="#" class="btn btn-primary py-2 mr-1">Book now</a> 
        <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a>
    </p>
</div>

    				</div>
    			</div>