<div class="col-md-7">
    <h3 class="head">{{$car->reviews->count()}} Reviews</h3>
    @foreach($car->reviews as $review)
    <div class="review d-flex">
        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
        <div class="desc">
            <h4>
                <span class="text-left">{{ $review->user->name }}</span>
                <span class="text-right">{{ $review->created_at }}</span>
            </h4>
            <p class="star">
                <span>
                    @for ($i = 0; $i < $review->rating; $i++)
                        <i class="ion-ios-star"></i>
                    @endfor
                    @for ($i = $review->rating; $i < 5; $i++)
                        <i class="ion-ios-star " style="color: gray;"></i>
                    @endfor
                </span>

                <!-- الرد على التعليق -->
                <!-- <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span> -->
            </p>
            <p>{{ $review->comment }}</p>
        </div>
    </div>

    @endforeach

</div>