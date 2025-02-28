<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function test()
    {
        $cars = Car::all();
        return view('test', compact('cars'));
    }


    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request )
    {

        $request->validate([
            'license_plate' => 'required|string|max:255|unique:cars,license_plate',
            'make' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:255',
            'price_per_month'  => 'required|numeric|min:0',
            'price_per_day'  => 'required|numeric|min:0',
            'price_per_hour'  => 'required|numeric|min:0',
            'status' => 'required|in:available,rented,maintenance',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);
        $data = $request->all();
    $car = Car::create($data);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/cars'), $imageName);

        CarImage::create([
        'car_id' => $car->id,
        'path' => 'images/cars/' . $imageName,
        ]);
    }

   

       
        return redirect()->route('cars.index')->with('success', 'تم إضافة السيارة بنجاح');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $request->validate([
            'license_plate' => 'required|string|max:255|unique:cars,license_plate,' . $car->id . ',id',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:255',
            'price_per_month'  => 'required|numeric|min:0',
            'price_per_day'  => 'required|numeric|min:0',
            'price_per_hour'  => 'required|numeric|min:0',
            'status' => 'required|in:available,rented,maintenance',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/cars'), $imageName);
            $data['image'] = 'images/cars/' . $imageName;
        }

        CarImage::where('car_id', $car->id)->update([
            'path' => "images/cars/{$imageName}"
        ]);
        $car->update($data);
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
