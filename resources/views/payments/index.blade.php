@extends('layouts.app')
@section('title', 'قائمة المدفوعات')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">المدفوعات</h1>
        <a href="{{ route('payments.create') }}" class="btn-primary text-white px-6 py-2 rounded shadow-md">إضافة دفعة</a>
    </div>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">الحجز</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">تاريخ الدفع</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">المبلغ</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">طريقة الدفع</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($payments as $payment)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-right">{{ $payment->reservation->customer->first_name }} {{ $payment->reservation->customer->last_name }} - {{ $payment->reservation->car->make }} {{ $payment->reservation->car->model }}</td>
                        <td class="px-6 py-4 text-right">{{ $payment->payment_date }}</td>
                        <td class="px-6 py-4 text-right">{{ number_format($payment->amount, 2) }} ريال</td>
                        <td class="px-6 py-4 text-right">{{ $payment->payment_method }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('payments.edit', $payment->payment_id) }}" class="text-blue-600 hover:text-blue-800 transition">تعديل</a>
                            <form action="{{ route('payments.destroy', $payment->payment_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">لا توجد مدفوعات حاليًا</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection