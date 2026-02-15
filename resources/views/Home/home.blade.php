@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>مرحباً بك في SafeStay</h1>
            <p>تجربة سكن استثنائية وآمنة للطلاب - احجز سكنك ووسيلة نقلك بكل سهولة</p>
            <button class="btn-primary" onclick="openModal()">ابدأ الآن</button>
            <div id="carouselExample" class="carousel slide">
  <!-- <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://www.weddingsutra.com/images/middle_east_hotel_pic11.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
        </div> -->
    </section>

    <!-- Carousel Section -->

    <!-- <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->

    <!-- Features Section -->
    <section class="features">
        <h2 class="section-title">لماذا تختار SafeStay</h2>
        <p class="section-subtitle">نوفر لك أفضل الخدمات لتجربة سكن مريحة وآمنة</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-house-heart-fill"></i>
                </div>
                <h3>سكن آمن ومريح</h3>
                <p>نوفر لك خيارات متنوعة من السكنات الآمنة والمريحة المناسبة لجميع الاحتياجات</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-car-front-fill"></i>
                </div>
                <h3>خدمة النقل</h3>
                <p>احجز وسيلة نقلك بسهولة من وإلى الجامعة مع خيارات متعددة</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-credit-card-fill"></i>
                </div>
                <h3>دفع آمن</h3>
                <p>نظام دفع إلكتروني آمن وموثوق لحجوزاتك بكل سهولة</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-phone-fill"></i>
                </div>
               <!-- !-->  <h3>سهولة الحجز</h3>
                <p>احجز سكنك ونقلك في دقائق من خلال منصتنا السهلة والبسيطة</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <h3>أمان وخصوصية</h3>
                <p>نحافظ على خصوصيتك وأمان بياناتك بأعلى معايير الحماية</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-headset"></i>
                </div>
                <h3>دعم على مدار الساعة</h3>
                <p>فريق الدعم متواجد لمساعدتك في أي وقت تحتاج فيه للمساعدة</p>
            </div>
        </div>
    </section>
    
@endsection