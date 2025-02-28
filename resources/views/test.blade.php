<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container">

    <h1 class="text-center my-4">Car List</h1>
    <div class="row">
        @foreach($cars as $car)
        <div class="col-md-6 car-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Car Details</h2>
                    <p><strong>Name:</strong> {{ $car->name }}</p>
                    <p><strong>Model:</strong> {{ $car->model }}</p>
                    <p><strong>Company:</strong> {{ $car->company }}</p>
                    <p><strong>Price per hour:</strong> {{ $car->price_per_hour }}</p>
                    <p><strong>Price per day:</strong> {{ $car->price_per_day }}</p>
                    <p><strong>Price per month:</strong> {{ $car->price_per_month }}</p>
                    <p><strong>Year:</strong> {{ $car->year }}</p>
                    <p><strong>Created by:</strong> {{ $car->user->name }}</p>
                    <p><strong>Description:</strong> {{ $car->description }}</p>

                    <h2>Images</h2>
                    <div class="d-flex flex-wrap">
                        @foreach ($car->images as $image)
                        <img src="{{ asset( $image->path) }}" alt="{{ $car->name }}" class="mr-2 mb-2">
                        @endforeach
                    </div>

                    <h2>Reservations</h2>
                    @foreach ($car->reservations as $reservation)
                    <p><strong>Start Reservation:</strong> {{ $reservation->start_date }}</p>
                    <p><strong>End Reservation:</strong> {{ $reservation->end_date }}</p>
                    @endforeach

                    <h2>Reviews</h2>
                    @foreach ($car->reviews as $review)
                    <p><strong>Comment by:</strong> {{ $review->user->name }}</p>
                    <p><strong>Comment:</strong> {{ $review->comment }}</p>
                    <p><strong>Rating:</strong> {{ $review->rating }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
