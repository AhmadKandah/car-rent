@extends('templet.layouts.app')

@section('content')
<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('images/bg_1.jpg') }}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
            <div class="col-md-8 ftco-animate text-center">
                <div class="text w-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-8">
                                <div class="login-wrap p-4 p-md-5">
                                    <div
                                        class="icon d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4">
                                        <span class="ion-ios-locked"></span>
                                    </div>
                                    <h3 class="text-center mb-4">تسجيل الدخول</h3>

                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    <form action="{{ route('login') }}" method="POST" class="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                class="form-control rounded-left @error('email') is-invalid @enderror"
                                                placeholder="البريد الإلكتروني" value="{{ old('email') }}" required>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password"
                                                class="form-control rounded-left @error('password') is-invalid @enderror"
                                                placeholder="كلمة المرور" required>
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group d-flex justify-content-between align-items-center">

                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                                <label class="form-check-label" for="remember">تذكرني</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="show-password">
                                                <label class="form-check-label" for="show-password">عرض كلمة المرور</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-between align-items-center">
    
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-primary">نسيت كلمة
                                                المرور؟</a>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn btn-primary rounded submit p-3 px-5 w-100">تسجيل
                                                الدخول</button>
                                        </div>
                                    </form>

                                    <div class="text-center">
                                        <p class="mb-0">ليس لديك حساب؟ <a href="{{ route('register') }}"
                                                class="text-primary">سجل الآن</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <!-- يمكن إضافة محتوى إضافي هنا إن أردت -->
</section>

@endsection

@section('scripts')
<script>
// عرض / إخفاء كلمة المرور
document.getElementById('show-password').addEventListener('change', function() {
    var passwordField = document.getElementById('password');
    passwordField.type = this.checked ? 'text' : 'password';
});
</script>
@endsection