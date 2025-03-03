
<tr class="">


    <td class="car-image" onmouseover="this.querySelector('.overlay').style.display='block';" onmouseout="this.querySelector('.overlay').style.display='none';">
        <div class="img" style="background-image:url({{ asset($car->images->first()->path??'') }}); position: relative;">
            <a href="{{ route('car.show', ['car' => $car->id]) }}" class="overlay" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); color: white; text-align: center; line-height: 100px;">View Details</a>
        </div>
        
    </td>
    
    <td class="product-name">
        
        <h3>{{ $car->brand }}</h3>
        <span class="status-label">{{ $car->status }}</span>
        <p class="mb-0 rated">
            <span>rated:</span>
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $car->reviews->avg('rating'))
                    <span class="ion-ios-star" style="color: gold;"></span>
                @else
                    <span class="ion-ios-star-outline" style="color: gray;"></span>
                @endif
            @endfor
                </p>
                <form action="{{ route('car.destroy', ['car' => $car->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <form action="{{ route('car.edit', ['car' => $car->id]) }}" method="GET" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
        </p>
        
    </td>

    <td class="price">
        <p class="btn-custom"><a href="#">Rent a car</a></p>
        <div class="price-rate">
            <h3>
                <span class="num"><small class="currency">$</small> {{ $car->price_per_hour }}</span>
                <span class="per">/per hour</span>
            </h3>
            <span class="subheading">$/hour fuel surcharges</span>
        </div>
    </td>

    <td class="price">
        <p class="btn-custom"><a href="#">Rent a car</a></p>
        <div class="price-rate">
            <h3>
                <span class="num"><small class="currency">$</small> {{ $car->price_per_day }}</span>
                <span class="per">/per day</span>
            </h3>
            <span class="subheading">$/hour fuel surcharges</span>
        </div>
    </td>

    <td class="price">
        <p class="btn-custom"><a href="#">Rent a car</a></p>
        <div class="price-rate">
            <h3>
                <span class="num"><small class="currency">$</small> {{ $car->price_per_month }}</span>
                <span class="per">/per month</span>
            </h3>
            <span class="subheading">$/hour fuel surcharges</span>
        </div>
    </td>
</tr><!-- END TR-->