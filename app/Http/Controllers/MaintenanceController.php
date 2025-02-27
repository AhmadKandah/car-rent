<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $maintenance = Maintenance::with('car')->get();
        return view('maintenance.index', compact('maintenance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $cars = Car::all();
        return view('maintenance.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'car_id' => 'required|exists:cars,car_id',
            'maintenance_date' => 'required|date',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric|min:0',
        ]);
    
        Maintenance::create($request->all());
        Car::find($request->car_id)->update(['status' => 'maintenance']);
        return redirect()->route('maintenance.index')->with('success', 'تم إضافة الصيانة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $maintenance = Maintenance::with('car')->findOrFail($id);
        return view('maintenance.show', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $maintenance = Maintenance::findOrFail($id);
        $cars = Car::all();
        return view('maintenance.edit', compact('maintenance', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'car_id' => 'required|exists:cars,car_id',
            'maintenance_date' => 'required|date',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric|min:0',
        ]);
    
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update($request->all());
        return redirect()->route('maintenance.index')->with('success', 'تم تعديل الصيانة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $maintenance = Maintenance::findOrFail($id);
        $car = Car::find($maintenance->car_id);
        $car->update(['status' => 'available']);
        $maintenance->delete();
        return redirect()->route('maintenance.index')->with('success', 'تم حذف الصيانة بنجاح');
    }
}
