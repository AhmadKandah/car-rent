<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - تأجير سيارات</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .nav-gradient { background: linear-gradient(90deg, #1e40af, #60a5fa); }
        .btn-primary { background: #1e40af; transition: all 0.3s; }
        .btn-primary:hover { background: #60a5fa; transform: scale(1.05); }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <nav class="nav-gradient text-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold tracking-tight">تأجير سيارات</a>
            <div class="space-x-6 space-x-reverse">
                @auth
                    <a href="{{ route('cars.index') }}" class="hover:text-gray-200 transition">السيارات</a>
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('customers.index') }}" class="hover:text-gray-200 transition">العملاء</a>
                        <a href="{{ route('reservations.index') }}" class="hover:text-gray-200 transition">الحجوزات</a>
                    @else
                        <a href="{{ route('reservations.index') }}" class="hover:text-gray-200 transition">حجوزاتي</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-gray-200 transition">تسجيل الخروج</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-gray-200 transition">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" class="hover:text-gray-200 transition">التسجيل</a>
                @endauth
            </div>
        </div>
    </nav>
    <main class="container mx-auto mt-8 p-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 shadow-sm">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="bg-gray-900 text-white text-center p-6 mt-12">
        <p class="text-sm">جميع الحقوق محفوظة © {{ date('Y') }}</p>
    </footer>
</body>
</html>