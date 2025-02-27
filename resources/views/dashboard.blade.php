@extends('layout')
@section('title', 'لوحة التحكم')
@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">مرحبًا، {{ auth()->user()->name }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">حجز سيارة جديدة</h2>
            <p class="text-gray-600">ابدأ بحجز سيارتك المفضلة الآن!</p>
            <a href="{{ route('reservations.create') }}" class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">حجز الآن</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">حجوزاتك</h2>
            <p class="text-gray-600">تحقق من حالة حجوزاتك الحالية.</p>
            <a href="{{ route('reservations.index') }}" class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">عرض الحجوزات</a>
        </div>
    </div>
@endsection