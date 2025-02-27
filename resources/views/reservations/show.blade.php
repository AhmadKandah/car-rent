@extends('layout')
@section('title', 'تفاصيل الحجز')
@section('content')
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">تفاصيل الحجز #{{ $reservation->reservation_id }}</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-gray-600"><strong>العميل:</strong> {{ $reservation->customer->first_name }} {{ $reservation->customer->last_name }}</p>
                <p class="text-gray-600"><strong>السيارة:</strong> {{ $reservation->car->make }} {{ $reservation->car->model }}</p>
                <p class="text-gray-600"><strong>تاريخ البداية:</strong> {{ $reservation->start_date }}</p>
            </div>
            <div>
                <p class="text-gray-600"><strong>تاريخ النهاية:</strong> {{ $reservation->end_date }}</p>
                <p class="text-gray-600"><strong>التكلفة الإجمالية:</strong> {{ $reservation->total_cost }} ريال</p>
                <p class="text-gray-600"><strong>الحالة:</strong> 
                    <span class="px-2 py-1 rounded text-sm {{ $reservation->reservation_status === 'confirmed' ? 'bg-green-100 text-green-800' : ($reservation->reservation_status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800') }}">
                        {{ $reservation->reservation_status === 'confirmed' ? 'مؤكد' : ($reservation->reservation_status === 'cancelled' ? 'ملغى' : 'مكتمل') }}
                    </span>
                </p>
            </div>
        </div>
        @if ($reservation->payments->count() > 0)
            <h2 class="text-xl font-semibold mt-6">المدفوعات</h2>
            <ul class="mt-2 space-y-2">
                @foreach ($reservation->payments as $payment)
                    <li class="bg-gray-50 p-3 rounded">{{ $payment->amount }} ريال - {{ $payment->payment_date }} ({{ $payment->payment_method }})</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection