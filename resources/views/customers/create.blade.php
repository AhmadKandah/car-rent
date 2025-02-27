@extends('layouts.app')
@section('title', 'إضافة عميل جديد')
@section('content')
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">إضافة عميل جديد</h1>
    <form action="{{ route('customers.store') }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">الاسم الأول</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('first_name')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">الاسم الأخير</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('last_name')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الهاتف</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('phone_number')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('email')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الرخصة</label>
                <input type="text" name="license_number" value="{{ old('license_number') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('license_number')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">العنوان (اختياري)</label>
                <input type="text" name="address" value="{{ old('address') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('address')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="mt-8 w-full btn-primary text-white px-6 py-3 rounded-lg shadow-md">إضافة العميل</button>
    </form>
@endsection