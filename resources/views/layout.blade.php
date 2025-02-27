<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - تأجير سيارات</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-indigo-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold">تأجير سيارات</a>
            <div class="space-x-4">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('customers.index') }}" class="hover:underline">العملاء</a>
                        <a href="{{ route('cars.index') }}" class="hover:underline">السيارات</a>
                        <a href="{{ route('reservations.index') }}" class="hover:underline">الحجوزات</a>
                        <a href="{{ route('payments.index') }}" class="hover:underline">المدفوعات</a>
                        <a href="{{ route('maintenance.index') }}" class="hover:underline">الصيانة</a>
                    @else
                        <a href="{{ route('reservations.create') }}" class="hover:underline">حجز سيارة</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">تسجيل الخروج</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" class="hover:underline">التسجيل</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 p-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        <p>جميع الحقوق محفوظة © {{ date('Y') }} - تأجير سيارات</p>
    </footer>
</body>
</html>