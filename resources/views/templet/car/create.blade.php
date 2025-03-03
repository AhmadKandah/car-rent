@extends('templet.layouts.app')

@section('content')
@include('templet.partials.navbar')
@include('templet.car.hero')

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-10 featured-top">
                <div class="row no-gutters justify-content-center">
                    <div class="col-md-12 d-flex align-items-center">
                        <form action="{{ route('car.store', ['user_id' => auth()->id()]) }}" method="POST" enctype="multipart/form-data" class="request-form ftco-animate bg-primary p-4">
                            @csrf
                            <h2 class="text-center mb-4">إضافة معلومات السيارة</h2>
                            <div class="row">
                                <!-- العمود الأول -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label">رقم اللوحة</label>
                                        <input type="text" name="license_plate" class="form-control" placeholder="رقم اللوحة" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">الماركة</label>
                                        <input type="text" name="brand" class="form-control" placeholder="الماركة" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">الموديل</label>
                                        <input type="text" name="model" class="form-control" placeholder="الموديل" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">بلد الصنع</label>
                                        <input type="text" name="make" class="form-control" placeholder="بلد الصنع" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">اللون</label>
                                        <input type="text" name="color" class="form-control" placeholder="اللون" required>
                                    </div>
                                </div>
                                
                                <!-- العمود الثاني -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label">سنة الصنع</label>
                                        <input type="number" name="year" class="form-control" placeholder="سنة الصنع" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">عدد الأميال</label>
                                        <input type="number" name="mileage" class="form-control" placeholder="عدد الأميال" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">ناقل الحركة</label>
                                        <input type="text" name="transmission" class="form-control" placeholder="أوتوماتيك / يدوي" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">عدد المقاعد</label>
                                        <input type="number" name="seats" class="form-control" placeholder="عدد المقاعد" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">عدد حقائب السفر</label>
                                        <input type="number" name="luggage" class="form-control" placeholder="عدد الحقائب" required>
                                    </div>
                                </div>

                                <!-- العمود الثالث -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label">نوع الوقود</label>
                                        <input type="text" name="fuel" class="form-control" placeholder="ديزل / بنزين / كهرباء" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">السعر لساعة واحدة</label>
                                        <input type="number" step="0.01" name="price_per_hour" class="form-control" placeholder="السعر بالساعة" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">السعر اليومي</label>
                                        <input type="number" step="0.01" name="price_per_day" class="form-control" placeholder="السعر اليومي" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">السعر الشهري</label>
                                        <input type="number" step="0.01" name="price_per_month" class="form-control" placeholder="السعر الشهري" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">وصف السيارة</label>
                                        <textarea name="description" class="form-control" placeholder="وصف السيارة" rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="label">صورة السيارة</label>
                                <input type="file" name="image" accept="image/*" class="btn btn-secondary " required>
                                @error('image')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-secondary py-3 px-4">إضافة السيارة</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
