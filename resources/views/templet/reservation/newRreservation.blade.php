@extends('templet.layouts.app')

@section('content')
@include('templet.partials.navbar')
@include('templet.car.hero')

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-10 featured-top">
                <div class="row no-gutters justify-content-center">
                    <div class="col-md-12 d-flex align-items-center">
                        <form action="#" method="POST" enctype="multipart/form-data" class="request-form ftco-animate bg-primary p-4">
                            @csrf
                           
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label">يبدأ الحجز من</label>
                                        <input type="datetime-local" name="booking_start" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label">ينتهي الحجز في</label>
                                        <input type="datetime-local" name="booking_end" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-secondary py-3 px-4">حجز السيارة</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
