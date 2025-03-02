<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private function handleImageUpload(Request $request, Car $car)
{
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/cars'), $imageName);

        CarImage::updateOrCreate(
            ['car_id' => $car->id],
            ['path' => 'images/cars/' . $imageName]
        );
    }
}


public function test()
{
    $cars = Car::all();
    return view('test', compact('cars'));
}

public function test2()
{
    $cars = Car::all();
    return view('templet.details.index', compact('cars'));
}
public function show($id)
{
$Reviews = Review::where('car_id', $id)->with('user')->get();
$carimages = CarImage::where('car_id', $id)->get();
$car = Car::findOrFail($id);
return view('templet.details.index', compact('Reviews', 'carimages', 'car'));
}

    public function index()
    {
        $cars = Car::with('images')->paginate(6);
 
        return view('templet.car.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(CarRequest $request)
    {      
        $data = $request->all();
        $car = Car::create($data);

        $this->handleImageUpload($request, $car);



        return redirect()->route('cars.index')->with('success', 'تم إضافة السيارة بنجاح');
    }

    public function edit($id)
    {
        $car=car::with('car_images')->findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(CarRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $data = $request->all();
        $car->update($data);

        $this->handleImageUpload($request, $car);

        return redirect()->route('cars.index')->with('success', 'تم تعديل السيارة بنجاح');
    }

    public function reserve(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        if ($car->status !== 'available') {
            return redirect()->route('cars.index')->with('error', 'هذه السيارة غير متاحة للحجز');
        }

        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();

        if (!$customer) {
            $customer = Customer::where('email', $user->email)->first();
            if ($customer) {
                $customer->update(['user_id' => $user->id]);
            } else {
                $customer = Customer::create([
                    'first_name' => $user->name,
                    'last_name' => '',
                    'phone_number' => '',
                    'email' => $user->email,
                    'license_number' => '',
                    'user_id' => $user->id,
                ]);
            }
        }

        $start_date = now();
        $end_date = now()->addDays(1);
        $total_cost = $car->rental_rate;

        Reservation::create([
            'customer_id' => $customer->customer_id,
            'id' => $car->id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'total_cost' => $total_cost,
            'reservation_status' => 'confirmed',
        ]);

        $car->update(['status' => 'rented']);

        return redirect()->route('cars.index')->with('success', 'تم حجز السيارة بنجاح');
    }
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        if ($car->reservations()->exists()) {
            return redirect()->route('cars.index')->with('error', 'لا يمكن حذف السيارة لأنها مرتبطة بحجوزات');
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'تم حذف السيارة بنجاح');
    }
}