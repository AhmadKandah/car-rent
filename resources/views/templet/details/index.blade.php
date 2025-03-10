@extends('templet.layouts.app')
@section('content')
@include('templet.partials.navbar')
@include('templet.car.hero')

<section class="ftco-section ftco-car-details">
    @include('templet.details.details')



    <div class="row">
        <div class="col-md-12 pills">
            <div class="bd-example bd-example-tabs">

                <!-- Features Description Review -->
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                        </li>
                    </ul>
                </div>
                <!-- end Features Description Review -->

                <div class="tab-content" id="pills-tabContent">

                    @include('templet.details.Features.Features')
                    @include('templet.details.Description.Description')
                    @include('templet.details.Review.index')



                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@include('templet.partials.footer')







@endsection