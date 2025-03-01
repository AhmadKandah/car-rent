<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">الرئيسية</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">من نحن</a></li>
                <li class="nav-item"><a href="services.html" class="nav-link">الخدمات</a></li>
                <li class="nav-item"><a href="pricing.html" class="nav-link">الأسعار</a></li>
                <li class="nav-item"><a href="{{ route('car.index') }}" class="nav-link">السيارات</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">المدونة </a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">اتصل بنا</a></li>
            </ul>
        </div>
    </div>
</nav>