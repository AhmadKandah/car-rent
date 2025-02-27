@extends('layouts.app')
@section('title', 'قائمة الحجوزات')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">الحجوزات</h1>
        @if (auth()->user()->role !== 'admin')
            <a href="{{ route('reservations.create') }}" class="btn-primary text-white px-6 py-2 rounded shadow-md">حجز جديد</a>
        @endif
    </div>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">العميل</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">السيارة</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">تاريخ البداية</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">تاريخ النهاية</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">التكلفة</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">الحالة</th>
                    @if (auth()->user()->role === 'admin')
                        <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">الإجراءات</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($reservations as $reservation)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-right">{{ $reservation->customer->first_name }} {{ $reservation->customer->last_name }}</td>
                        <td class="px-6 py-4 text-right">{{ $reservation->car->make }} {{ $reservation->car->model }}</td>
                        <td class="px-6 py-4 text-right">{{ $reservation->start_date }}</td>
                        <td class="px-6 py-4 text-right">{{ $reservation->end_date }}</td>
                        <td class="px-6 py-4 text-right">{{ number_format($reservation->total_cost, 2) }} ريال</td>
                        <td class="px-6 py-4 text-right">
                            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $reservation->reservation_status === 'confirmed' ? 'bg-green-100 text-green-800' : ($reservation->reservation_status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800') }}">
                                {{ $reservation->reservation_status === 'confirmed' ? 'مؤكد' : ($reservation->reservation_status === 'cancelled' ? 'ملغى' : 'مكتمل') }}
                            </span>
                        </td>
                        @if (auth()->user()->role === 'admin')
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('reservations.edit', $reservation->reservation_id) }}" class="text-blue-600 hover:text-blue-800 transition">تعديل</a>
                                <form action="{{ route('reservations.destroy', $reservation->reservation_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->user()->role === 'admin' ? 7 : 6 }}" class="px-6 py-4 text-center text-gray-500">لا توجد حجوزات حاليًا</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection