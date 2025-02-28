@extends('layouts.app')
@section('title', 'قائمة السيارات')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">قائمة السيارات</h1>
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('cars.create') }}" class="btn-primary text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">إضافة سيارة</a>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($cars as $car)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="h-48 w-full">
                        @if ($car->images->count() > 0)
                            <img src="{{ asset($car->images->first()->path) }}" alt="{{ $car->make }} {{ $car->model }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500 text-sm">لا توجد صورة</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $car->make }} {{ $car->model }}</h2>
                        <div class="space-y-2 text-gray-700">
                            <p><span class="font-medium">رقم اللوحة:</span> {{ $car->license_plate }}</p>
                            <p><span class="font-medium">السنة:</span> {{ $car->year }}</p>
                            <p><span class="font-medium">اللون:</span> {{ $car->color }}</p>
                            <p><span class="font-medium">السعر اليومي:</span> {{ number_format($car->rental_rate, 2) }} ريال</p>
                            <p>
                                <span class="font-medium">الحالة:</span>
                                <span class="px-3 py-1 rounded-full text-sm font-medium {{ $car->status === 'available' ? 'bg-green-100 text-green-800' : ($car->status === 'rented' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $car->status === 'available' ? 'متاحة' : ($car->status === 'rented' ? 'مستأجرة' : 'في الصيانة') }}
                                </span>
                            </p>
                        </div>
                        <div class="mt-6 flex justify-end space-x-2 space-x-reverse">
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('cars.edit', $car->car_id) }}" class="inline-flex items-center px-3 py-1 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                                    تعديل
                                </a>
                                <form action="{{ route('cars.destroy', $car->car_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 text-white text-sm rounded-md hover:bg-red-700 transition-all duration-300 transform hover:scale-105" onclick="return confirm('هل أنت متأكد؟')">
                                        حذف
                                    </button>
                                </form>
                            @elseif ($car->status === 'available')
                                <form action="" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-green-600 text-white text-sm rounded-md hover:bg-green-700 transition-all duration-300 transform hover:scale-105">
                                        حجز
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">لا توجد سيارات حاليًا</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection