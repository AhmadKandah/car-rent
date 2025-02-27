<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $payments = Payment::with('reservation')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $reservations = Reservation::where('reservation_status', 'confirmed')->get();
        return view('payments.create', compact('reservations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,reservation_id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
        ]);
    
        Payment::create($request->all());
        return redirect()->route('payments.index')->with('success', 'تم إضافة الدفعة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $payment = Payment::with('reservation')->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $payment = Payment::findOrFail($id);
        $reservations = Reservation::where('reservation_status', 'confirmed')->get();
        return view('payments.edit', compact('payment', 'reservations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,reservation_id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
        ]);
    
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return redirect()->route('payments.index')->with('success', 'تم تعديل الدفعة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'تم حذف الدفعة بنجاح');
    }
}
