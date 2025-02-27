<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $reservations = Reservation::with(['customer', 'car'])->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $customers = Customer::all();
        $cars = Car::where('status', 'available')->get();
        return view('reservations.create', compact('customers', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'car_id' => 'required|exists:cars,car_id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);
    
        $car = Car::findOrFail($request->car_id);
        if ($car->status !== 'available') {
            return redirect()->back()->with('error', 'السيارة غير متاحة');
        }
    
        $days = (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24);
        $total_cost = $days * $car->rental_rate;
    
        $reservation = Reservation::create([
            'customer_id' => $request->customer_id,
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $total_cost,
            'reservation_status' => 'confirmed',
        ]);
    
        $car->update(['status' => 'rented']);
        return redirect()->route('reservations.index')->with('success', 'تم الحجز بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $reservation = Reservation::with(['customer', 'car', 'payments'])->findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $reservation = Reservation::findOrFail($id);
        $customers = Customer::all();
        $cars = Car::where('status', 'available')->orWhere('car_id', $reservation->car_id)->get();
        return view('reservations.edit', compact('reservation', 'customers', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'car_id' => 'required|exists:cars,car_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'reservation_status' => 'required|in:confirmed,cancelled,completed',
        ]);
    
        $reservation = Reservation::findOrFail($id);
        $old_car = Car::find($reservation->car_id);
    
        if ($old_car->car_id != $request->car_id) {
            $new_car = Car::findOrFail($request->car_id);
            if ($new_car->status !== 'available') {
                return redirect()->back()->with('error', 'السيارة الجديدة غير متاحة');
            }
            $old_car->update(['status' => 'available']);
            $new_car->update(['status' => 'rented']);
        }
    
        $days = (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24);
        $total_cost = $days * Car::find($request->car_id)->rental_rate;
    
        $reservation->update([
            'customer_id' => $request->customer_id,
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $total_cost,
            'reservation_status' => $request->reservation_status,
        ]);
    
        return redirect()->route('reservations.index')->with('success', 'تم تعديل الحجز بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $reservation = Reservation::findOrFail($id);
        $car = Car::find($reservation->car_id);
        if ($reservation->reservation_status == 'confirmed') {
            $car->update(['status' => 'available']);
        }
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'تم حذف الحجز بنجاح');
    }
}
