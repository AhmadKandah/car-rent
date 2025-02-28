@extends('layouts.app')
@section('title', 'تعديل السيارة')
@section('content')
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">تعديل بيانات السيارة</h1>
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">رقم اللوحة</label>
                <input type="text" name="license_plate" value="{{ old('license_plate', $car->license_plate) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('license_plate')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">brand</label>
                <input type="text" name="brand" value="{{ old('brand', $car->make) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('brand')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">الوصف</label>
                <input type="text" name="description" value="{{ old('description', $car->description) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('description')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">الشركة المصنعة</label>
                <input type="text" name="make" value="{{ old('make', $car->make) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('make')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">الموديل</label>
                <input type="text" name="model" value="{{ old('model', $car->model) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('model')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">سنة الصنع</label>
                <input type="number" name="year" value="{{ old('year', $car->year) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('year')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">اللون</label>
                <input type="text" name="color" value="{{ old('color', $car->color) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('color')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">السعر اليومي (ريال)</label>
                <input type="number" name="price_per_month" step="0.01" value="{{ old('price_per_month', $car->price_per_month) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('price_per_month')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">السعر اليومي (ريال)</label>
                <input type="number" name="price_per_day" step="0.01" value="{{ old('price_per_day', $car->price_per_day) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('price_per_day')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror   
            <div>
                <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">السعر لساعة واحدة (ريال)</label>
                <input type="number" name="price_per_hour" step="0.01" value="{{ old('price_per_hour', $car->price_per_hour) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required> 
                @error('price_per_hour')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>   
                @enderror

                <label class="block text-sm font-semibold text-gray-700 mb-2">الحالة</label>
                <select name="status" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="available" {{ old('status', $car->status) === 'available' ? 'selected' : '' }}>متاحة</option>
                    <option value="rented" {{ old('status', $car->status) === 'rented' ? 'selected' : '' }}>مستأجرة</option>
                    <option value="maintenance" {{ old('status', $car->status) === 'maintenance' ? 'selected' : '' }}>في الصيانة</option>
                </select>
                @error('status')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">صورة السيارة (اختياري)</label>
                <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @if ($car->image)
                    <img src="{{ asset($car->image) }}" alt="الصورة الحالية" class="mt-2 w-32 h-32 object-cover rounded-md">
                @endif
                @error('image')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="mt-8 w-full btn-primary text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">حفظ التعديلات</button>
    </form>
@endsection