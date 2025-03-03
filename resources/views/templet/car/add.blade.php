
@extends('templet.layouts.app')
@section('content')
@include('templet.partials.navbar')
@include('templet.car.hero')

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدخال بيانات السيارة</title>
   
</head>
<body>
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <form action="#" class="request-form ftco-animate">
                                <h2>إدخال بيانات السيارة</h2>
                                <div class="accordion">
                                    <!-- القسم الأول: المعلومات الأساسية -->
                                    <div class="accordion-item">
                                        <button type="button" class="accordion-header">المعلومات الأساسية</button>
                                        <div class="accordion-content">
                                            <div class="form-columns">
                                                <div class="form-column">
                                                    <div class="form-group">
                                                        <label for="license_plate" class="label">رقم اللوحة</label>
                                                        <input type="text" class="form-control" id="license_plate" placeholder="أدخل رقم اللوحة" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brand" class="label">الماركة</label>
                                                        <input type="text" class="form-control" id="brand" placeholder="مثال: تويوتا" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="model" class="label">الموديل</label>
                                                        <input type="text" class="form-control" id="model" placeholder="مثال: كامري" required>
                                                    </div>
                                                </div>
                                                <div class="form-column">
                                                    <div class="form-group">
                                                        <label for="make" class="label">الصنع</label>
                                                        <input type="text" class="form-control" id="make" placeholder="مثال: ياباني" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="color" class="label">اللون</label>
                                                        <input type="text" class="form-control" id="color" placeholder="مثال: أبيض" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="year" class="label">سنة الصنع</label>
                                                        <input type="number" class="form-control" id="year" placeholder="مثال: 2023" min="1900" max="2025" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- القسم الثاني: الأسعار -->
                                    <div class="accordion-item">
                                        <button type="button" class="accordion-header">الأسعار</button>
                                        <div class="accordion-content">
                                            <div class="form-columns">
                                                <div class="form-column">
                                                    <div class="form-group">
                                                        <label for="price_per_hour" class="label">السعر بالساعة</label>
                                                        <input type="number" class="form-control" id="price_per_hour" placeholder="مثال: 50" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price_per_day" class="label">السعر باليوم</label>
                                                        <input type="number" class="form-control" id="price_per_day" placeholder="مثال: 300" required>
                                                    </div>
                                                </div>
                                                <div class="form-column">
                                                    <div class="form-group">
                                                        <label for="price_per_month" class="label">السعر بالشهر</label>
                                                        <input type="number" class="form-control" id="price_per_month" placeholder="مثال: 8000" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- القسم الثالث: التفاصيل الفنية -->
                                    <div class="accordion-item">
                                        <button type="button" class="accordion-header">التفاصيل الفنية</button>
                                        <div class="accordion-content">
                                            <div class="form-columns">
                                                <div class="form-column">
                                                    <div class="form-group">
                                                        <label for="mileage" class="label">عدد الكيلومترات</label>
                                                        <input type="number" class="form-control" id="mileage" placeholder="مثال: 15000" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="transmission" class="label">نوع ناقل الحركة</label>
                                                        <select class="form-control" id="transmission" required>
                                                            <option value="">اختر</option>
                                                            <option value="automatic">أوتوماتيك</option>
                                                            <option value="manual">يدوي</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="seats" class="label">عدد المقاعد</label>
                                                        <input type="number" class="form-control" id="seats" placeholder="مثال: 5" required>
                                                    </div>
                                                </div>
                                                <div class="form-column">
                                                    <div class="form-group">
                                                        <label for="luggage" class="label">سعة الأمتعة</label>
                                                        <input type="number" class="form-control" id="luggage" placeholder="مثال: 2" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fuel" class="label">نوع الوقود</label>
                                                        <select class="form-control" id="fuel" required>
                                                            <option value="">اختر</option>
                                                            <option value="petrol">بنزين</option>
                                                            <option value="diesel">ديزل</option>
                                                            <option value="electric">كهربائي</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status" class="label">الحالة</label>
                                                        <select class="form-control" id="status" required>
                                                            <option value="">اختر</option>
                                                            <option value="available">متوفرة</option>
                                                            <option value="rented">مؤجرة</option>
                                                            <option value="maintenance">تحت الصيانة</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="label">الوصف</label>
                                                <textarea class="form-control" id="description" rows="3" placeholder="أدخل وصف السيارة"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="حفظ بيانات السيارة" class="btn btn-secondary">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4">أفضل طريقة لإدارة أسطول سياراتك</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">أدخل بيانات السيارة</h3>
                                            </div>
                                        </div>      
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">حدد الأسعار المناسبة</h3>
                                            </div>
                                        </div>      
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">تابع حالة السيارة</h3>
                                            </div>
                                        </div>      
                                    </div>
                                </div>
                                <p><a href="#" class="btn btn-primary py-3 px-4">إضافة سيارة جديدة</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('.accordion-header').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>