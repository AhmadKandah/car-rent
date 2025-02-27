@extends('layouts.app')
@section('title', 'تعديل الحجز')
@section('content')
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">تعديل بيانات الحجز</h1>
    <form action="{{ route('reservations.update', $reservation->reservation_id) }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">العميل</label>
                <select name="customer_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->customer_id }}" {{ old('customer_id', $reservation->customer_id) == $customer->customer_id ? 'selected' : '' }}>{{ $customer->first_name }} {{ $customer->last_name }}</option>
                    @endforeach
                </select>
                @error('customer_id')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">السيارة</label>
                <select name="car_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    @foreach ($cars as $car)
                        <option value="{{ $car->car_id }}" {{ old('car_id', $reservation->car_id) == $car->car_id ? 'selected' : '' }}>{{ $car->make }} {{ $car->model }} ({{ $car->rental_rate }} ريال/يوم)</option>
                    @endforeach
                </select>
                @error('car_id')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">تاريخ البداية</label>
                <input type="datetime-local" name="start_date" value="{{ old('start_date', $reservation->start_date) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('start_date')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">تاريخ النهاية</label>
                <input type="datetime-local" name="end_date" value="{{ old('end_date', $reservation->end_date) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('end_date')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">الحالة</label>
                <select name="reservation_status" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="confirmed" {{ old('reservation_status', $reservation->reservation_status) === 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                    <option value="cancelled" {{ old('reservation_status', $reservation->reservation_status) === 'cancelled' ? 'selected' : '' }}>ملغى</option>
                    <option value="completed" {{ old('reservation_status', $reservation->reservation_status) === 'completed' ? 'selected' : '' }}>مكتمل</option>
                </select>
                @error('reservation_status')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="mt-8 w-full btn-primary text-white px-6 py-3 rounded-lg shadow-md">حفظ التعديلات</button>
    </form>
@endsection