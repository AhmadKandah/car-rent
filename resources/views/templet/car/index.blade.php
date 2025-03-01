@extends('templet.layouts.app')
@section('content')
@include('templet.partials.navbar')
@include('templet.car.hero')

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      @foreach($cars as $car)
      @include('templet.car.car')
      @endforeach
    </div>
  </div>
  <div class="d-flex justify-content-center mt-2">
    {{ $cars->links('pagination::bootstrap-4') }}
  </div>
</section>







@endsection