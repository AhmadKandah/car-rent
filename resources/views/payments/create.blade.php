@extends('layouts.app')
@section('title', 'إضافة دفعة جديدة')
@section('content')
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">إضافة دفعة جديدة</h1>
    <form action="{{ route('payments.store') }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">الحجز</label>
                <select name="reservation_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    @foreach ($reservations as $reservation)
                        <option value="{{ $reservation->reservation_id }}" {{ old('reservation_id') == $reservation->reservation_id ? 'selected' : '' }}>
                            {{ $reservation->customer->first_name }} {{ $reservation->customer->last_name }} - {{ $reservation->car->make }} {{ $reservation->car->model }}
                        </option>
                    @endforeach
                </select>
                @error('reservation_id')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">تاريخ الدفع</label>
                <input type="datetime-local" name="payment_date" value="{{ old('payment_date') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('payment_date')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">المبلغ (ريال)</label>
                <input type="number" name="amount" step="0.01" value="{{ old('amount') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('amount')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">طريقة الدفع</label>
                <input type="text" name="payment_method" value="{{ old('payment_method') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('payment_method')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="mt-8 w-full btn-primary text-white px-6 py-3 rounded-lg shadow-md">إضافة الدفعة</button>
    </form>
@endsection