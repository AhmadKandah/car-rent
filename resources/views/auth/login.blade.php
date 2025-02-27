@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-900 via-indigo-800 to-blue-700 py-12 px-4 sm:px-6 lg:px-8" style=" background: linear-gradient(to right, rgba(30, 64, 175, 0.4), rgba(96, 165, 250, 0.4)), url('/images/p1.jpg'); background-size: cover; background-position: center;">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-2xl transform transition-all hover:scale-105 duration-300">
            <div>
                <h2 class="mt-6 text-center text-4xl font-extrabold text-gray-900">تسجيل الدخول</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    مرحبًا بك في نظام تأجير السيارات
                </p>
            </div>

            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email-address" class="sr-only">البريد الإلكتروني</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                               class="appearance-none rounded-t-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all duration-300"
                               placeholder="البريد الإلكتروني" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">كلمة المرور</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="appearance-none rounded-b-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all duration-300"
                               placeholder="كلمة المرور">
                        @error('password')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember-me" class="mr-2 block text-sm text-gray-900">تذكرني</label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-800 transition">
                                نسيت كلمة المرور؟
                            </a>
                        </div>
                    @endif
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105">
                        <span class="absolute right-0 inset-y-0 flex items-center pr-3">
                            <svg class="h-5 w-5 text-blue-300 group-hover:text-blue-400 transition" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        تسجيل الدخول
                    </button>
                </div>
            </form>

            <p class="mt-2 text-center text-sm text-gray-600">
                ليس لديك حساب؟
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800 transition">
                    سجل الآن
                </a>
            </p>
        </div>
    </div>
@endsection