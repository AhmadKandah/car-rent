<div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
	<div class="row">
		<div class="col-md-7">
			<h3 class="head">23 Reviews</h3>
			<div class="review d-flex">
				<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
				<div class="desc">
					<h4>
						<span class="text-left">Jacob Webb</span>
						<span class="text-right">14 March 2018</span>
					</h4>
					<p class="star">
						<span>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
						</span>
						<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
					</p>
					@foreach ($Reviews as $review )
					<p>
						{{ $review->comment }}
					<p>
						@endforeach


				</div>
			</div>

		</div>
		@foreach($Reviews as $Review)
		<div class="col-md-5">
			<div class="rating-wrap">
				<h3 class="head">Give a Review</h3>
				<div class="wrap">
					<p class="star">
						<span>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							(98%)
						</span>
						<span>20 Reviews</span>
					</p>
					<p class="star">
						<span>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							(85%)
						</span>
						<span>10 Reviews</span>
					</p>
					<p class="star">
						<span>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							(70%)
						</span>
						<span>5 Reviews</span>
					</p>
					<p class="star">
						<span>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							(10%)
						</span>
						<span>0 Reviews</span>
					</p>
					<p class="star">
						<span>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							(0%)
						</span>
						<span>{{$Reviews}}</span>
					</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>