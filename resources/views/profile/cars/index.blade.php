@extends('layout')
@section('title', 'قائمة السيارات')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">السيارات</h1>
        <a href="{{ route('cars.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">إضافة سيارة</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-500">الشركة</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-500">الموديل</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-500">الحالة</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-500">السعر اليومي</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-500">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($cars as $car)
                    <tr>
                        <td class="px-6 py-4 text-right">{{ $car->make }}</td>
                        <td class="px-6 py-4 text-right">{{ $car->model }}</td>
                        <td class="px-6 py-4 text-right">
                            <span class="px-2 py-1 rounded text-sm {{ $car->status === 'available' ? 'bg-green-100 text-green-800' : ($car->status === 'rented' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $car->status === 'available' ? 'متاحة' : ($car->status === 'rented' ? 'مستأجرة' : 'في الصيانة') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">{{ $car->rental_rate }} ريال</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('cars.edit', $car->car_id) }}" class="text-indigo-600 hover:underline">تعديل</a>
                            <form action="{{ route('cars.destroy', $car->car_id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">لا توجد سيارات</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection