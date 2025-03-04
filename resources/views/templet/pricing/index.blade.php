@extends('templet.layouts.app')
@section('content')
@include('templet.partials.navbar')
@include('templet.car.hero')

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="car-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								@can('create', App\Models\Car::class)
								<th class="primary heading">
									<a href="{{ route('car.create') }}" class="btn btn-primary btn-lg">إضافة سيارة</a>
								</th>
								@endcan
								@cannot('create', App\Models\Car::class)
								<th>&nbsp;</th>
								@endcannot
								<th>&nbsp;</th>
								<th class="bg-primary heading">Per Hour Rate</th>
								<th class="bg-dark heading">Per Day Rate</th>
								<th class="bg-black heading">Leasing</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($cars as $car )
							@include('templet.pricing.car')

							@endforeach
							<tr>
								<td colspan="5" class="col text-center">
									<nav aria-label="Page navigation example">
										<ul class="pagination justify-content-center">
											{{ $cars->links('pagination::bootstrap-4') }}
										</ul>
									</nav>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection