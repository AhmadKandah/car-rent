@extends('layouts.app')
@section('title', 'تعديل سجل الصيانة')
@section('content')
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">تعديل بيانات سجل الصيانة</h1>
    <form action="{{ route('maintenance.update', $maintenance->maintenance_id) }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">السيارة</label>
                <select name="car_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    @foreach ($cars as $car)
                        <option value="{{ $car->car_id }}" {{ old('car_id', $maintenance->car_id) == $car->car_id ? 'selected' : '' }}>{{ $car->make }} {{ $car->model }} ({{ $car->license_plate }})</option>
                    @endforeach
                </select>
                @error('car_id')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">تاريخ الصيانة</label>
                <input type="datetime-local" name="maintenance_date" value="{{ old('maintenance_date', $maintenance->maintenance_date) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('maintenance_date')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">الوصف (اختياري)</label>
                <textarea name="description" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $maintenance->description) }}</textarea>
                @error('description')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">التكلفة (ريال، اختياري)</label>
                <input type="number" name="cost" step="0.01" value="{{ old('cost', $maintenance->cost) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('cost')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="mt-8 w-full btn-primary text-white px-6 py-3 rounded-lg shadow-md">حفظ التعديلات</button>
    </form>
@endsection