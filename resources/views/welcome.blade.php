<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبًا بك - تأجير السيارات</title>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Almarai', sans-serif;
            overflow-x: hidden;
        }
        .hero-bg {
            background: linear-gradient(to right, rgba(30, 64, 175, 0.4), rgba(96, 165, 250, 0.4)), url(/images/p2.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .animate-fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
        .animate-slide-up {
            animation: slideUp 1s ease-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        @keyframes slideUp {
            0% { transform: translateY(50px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        h1 {
            font-weight: 800;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="hero-wrap ftco-degree-bg flex items-center justify-center" style="background-image: url('{{ asset('images/bg_1.jpg') }}'); height: 100vh;" data-stellar-background-ratio="0.5">
    <div class="text-center space-y-10">
        <h1 class="text-6xl md:text-7xl font-extrabold animate-fade-in">مرحبًا بك في عالم تأجير السيارات</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-slide-up">
            استمتع بتجربة تأجير سيارات فاخرة بأعلى مستويات الراحة والأناقة مع خدماتنا المتميزة.
        </p>
        <div class="flex justify-center space-x-6 animate-slide-up">
            <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                تسجيل الدخول
                <svg class="mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 border border-white text-lg font-semibold rounded-md text-white hover:bg-white hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                إنشاء حساب
            </a>
        </div>
    </div>
</div>


<footer class="bg-gray-900 text-white text-center py-8">
    <p class="text-lg">جميع الحقوق محفوظة © {{ date('Y') }} - تأجير السيارات الفاخرة</p>
</footer>
</html>