<div class="col-md-5">
    <div class="rating-wrap">
        <h3 class="head">Give a Review</h3>
        <div class="wrap">


            @foreach($ratingCounts as $key => $value)
            <p class="star">
                <span>
                    @for ($i=0; $i < $key ; $i++)
                        <i class="ion-ios-star"></i>
                        @endfor
                        @for ($i = $key; $i < 5; $i++)
                            <i class="ion-ios-star " style="color: gray;"></i>
                            @endfor
                            ({{ round(($value / array_sum($ratingCounts->toArray())) * 100, 2) }}%)
                </span>
              
                <span>{{$value}} Reviews </span>
            </p>
            @endforeach

        </div>
    </div>
</div>