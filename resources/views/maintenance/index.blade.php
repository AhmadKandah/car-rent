@extends('layouts.app')
@section('title', 'قائمة الصيانة')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">سجل الصيانة</h1>
        <a href="{{ route('maintenance.create') }}" class="btn-primary text-white px-6 py-2 rounded shadow-md">إضافة سجل صيانة</a>
    </div>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">السيارة</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">تاريخ الصيانة</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">الوصف</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">التكلفة</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-blue-600">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($maintenance as $record)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-right">{{ $record->car->make }} {{ $record->car->model }} ({{ $record->car->license_plate }})</td>
                        <td class="px-6 py-4 text-right">{{ $record->maintenance_date }}</td>
                        <td class="px-6 py-4 text-right">{{ $record->description ?? 'لا يوجد وصف' }}</td>
                        <td class="px-6 py-4 text-right">{{ $record->cost ? number_format($record->cost, 2) . ' ريال' : 'غير محدد' }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('maintenance.edit', $record->maintenance_id) }}" class="text-blue-600 hover:text-blue-800 transition">تعديل</a>
                            <form action="{{ route('maintenance.destroy', $record->maintenance_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">لا توجد سجلات صيانة حاليًا</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection