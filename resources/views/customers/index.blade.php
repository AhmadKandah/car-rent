@extends('layouts.app')
@section('title', 'قائمة العملاء')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">العملاء</h1>
        <a href="{{ route('customers.create') }}" class="btn-primary text-white px-6 py-2 rounded shadow-md">إضافة عميل</a>
    </div>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">الاسم</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">رقم الهاتف</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">البريد الإلكتروني</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($customers as $customer)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-right">{{ $customer->first_name }} {{ $customer->last_name }}</td>
                        <td class="px-6 py-4 text-right">{{ $customer->phone_number }}</td>
                        <td class="px-6 py-4 text-right">{{ $customer->email }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('customers.edit', $customer->customer_id) }}" class="text-blue-600 hover:text-blue-800 transition">تعديل</a>
                            <form action="{{ route('customers.destroy', $customer->customer_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">لا توجد عملاء حاليًا</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection