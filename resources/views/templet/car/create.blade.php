
@extends('templet.layouts.app')
@section('content')
@include('templet.partials.navbar')
@include('templet.car.hero')

<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-200	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-200 d-flex align-items-center">
	  						<form action="#" class="request-form ftco-animate bg-primary">
								<table>
									<h2 >إضافة معلومات السيارة </h2>
									<td>
										
		          		
			    				<div class="form-group">
			    					<label for="" class="label" > نوع السيارة </label>
			    					<input type="text" class="form-control" placeholder="11211">
			    				</div>
			    				<div class="form-group">
			    					<label for="" class="label">الماركة </label>
			    					<input type="text" class="form-control" placeholder="City, Airport, Station, etc">
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group mr-2">
			                <label for="" class="label">يبدأ الحجز من  </label>
			                <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
			              </div>
			              <div class="form-group ml-1">
			                <label for="" class="label"> ينتهي الحجز في  </label>
			                <input type="text" class="form-control" id="book_off_date" placeholder="Date">
			              </div>
		              </div>
		              <div class="form-group">
		                <label for="" class="label">وقت التسليم  </label>
		                <input type="text" class="form-control" id="time_pick" placeholder="Time">
		              </div>
			            <div class="form-group">
			              <input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
			            </div>
			    		</td>
						<td>
										
	  					   <div class="col-md-200 d-flex align-items-center">
						 
			    				<div class="form-group ml-3">
			    					<label for="" class="label">نوع الوقود </label>
			    					<input type="text" class="form-control" placeholder="ديزل ,بنزين ,كهرباء">
			    				<div class="form-group ml-3">
			    					<label for="" class="label">ناقل الحركة  </label>
			    					<input type="text" class="form-control" placeholder="أوتوماتيك ,غير عادي ,ذاتية القيادة">
									<div class="form-group">
			    					<label for="" class="label">سعة المقاعد </label>
			    					<input type="text" class="form-control" placeholder="2,4,8,تريلا ">
									<div class="form-group">
			    					<label for="" class="label">السعر لساعة واحدة  </label>
			    					<input type="text" class="form-control" placeholder="50$">
			    				    <div class="form-group">
			    					<label for="" class="label">السعر اليومي  </label>
			    					<input type="text" class="form-control" placeholder=" 100$ "">
									<div class="form-group">
			    					<label for="" class="label">السعر الشهري </label>
			    					<input type="text" class="form-control" placeholder="500$"">
			    				</div>
			    				</div>

							
			    				<div class="form-group">
								</td>
								</table>
								</form>
								</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>
