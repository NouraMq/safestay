@extends('layouts.app')

@section('title', 'SafeStay - تجربة سكن استثنائية')

@section('styles')
<style>
    /* Hero Section - ULTRA PREMIUM */
    .hero-section {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin: -2rem -2rem 3rem -2rem;
    }
    
    .hero-bg {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #0f3460 0%, #16213e 50%, #1a1a2e 100%);
        z-index: -1;
    }
    
    .hero-particles {
        position: absolute;
        inset: 0;
        background-image: 
            radial-gradient(circle at 20% 30%, rgba(102, 126, 234, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(118, 75, 162, 0.3) 0%, transparent 50%);
        animation: particleFloat 20s ease-in-out infinite;
    }
    
    @keyframes particleFloat {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(20px, -20px); }
    }
    
    .hero-content {
        position: relative;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        text-align: center;
        z-index: 10;
    }
    
    .hero-badge {
        display: inline-block;
        padding: 0.6rem 1.5rem;
        background: rgba(102, 126, 234, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
        animation: fadeInUp 1s ease;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .hero-title {
        font-size: 4.5rem;
        font-weight: 900;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #fff 0%, #e0e0e0 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: fadeInUp 1s ease 0.2s both;
    }
    
    .hero-subtitle {
        font-size: 1.5rem;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 3rem;
        font-weight: 400;
        animation: fadeInUp 1s ease 0.4s both;
    }
    
    /* Search Box - ULTRA MODERN */
    .search-box {
        background: rgba(26, 26, 46, 0.8);
        backdrop-filter: blur(20px);
        padding: 2.5rem;
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        animation: fadeInUp 1s ease 0.6s both;
        max-width: 1100px;
        margin: 0 auto;
    }
    
    .search-tabs {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        background: rgba(255, 255, 255, 0.05);
        padding: 0.5rem;
        border-radius: 16px;
    }
    
    .search-tab {
        flex: 1;
        padding: 1rem;
        background: transparent;
        border: none;
        border-radius: 12px;
        font-family: 'Tajawal', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        color: rgba(255, 255, 255, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.7rem;
    }
    
    .search-tab.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
    }
    
    .search-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1rem;
    }
    
    .form-field {
        padding: 1.2rem;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        font-size: 1rem;
        font-family: 'Tajawal', sans-serif;
        transition: all 0.3s;
        color: white;
    }
    
    .form-field::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }
    
    .form-field:focus {
        outline: none;
        border-color: #667eea;
        background: rgba(255, 255, 255, 0.12);
    }
    
    .btn-search {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.2rem 2.5rem;
        border: none;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        font-family: 'Tajawal', sans-serif;
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
    }
    
    .btn-search:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(102, 126, 234, 0.6);
    }
    
    /* Section Header */
    .section-header {
        text-align: center;
        margin: 5rem 0 3rem;
    }
    
    .section-label {
        display: inline-block;
        padding: 0.5rem 1.2rem;
        background: rgba(102, 126, 234, 0.15);
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 700;
        color: #667eea;
        margin-bottom: 1rem;
    }
    
    .section-title {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #fff 0%, rgba(255, 255, 255, 0.7) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .section-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.6);
    }
    
    /* Destinations - ULTRA PREMIUM */
    .destinations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 5rem;
    }
    
    .destination-card {
        position: relative;
        height: 350px;
        border-radius: 20px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.4s;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .destination-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 60px rgba(102, 126, 234, 0.3);
    }
    
    .destination-bg {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.3), rgba(118, 75, 162, 0.3));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 6rem;
        filter: grayscale(100%);
        transition: all 0.4s;
    }
    
    .destination-card:hover .destination-bg {
        transform: scale(1.1);
        filter: grayscale(0%);
    }
    
    .destination-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 2rem;
    }
    
    .destination-name {
        font-size: 2rem;
        font-weight: 900;
        color: white;
        margin-bottom: 0.5rem;
    }
    
    .destination-count {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.7);
    }
    
    /* Features - ULTRA PREMIUM */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 5rem;
    }
    
    .feature-card {
        background: rgba(26, 26, 46, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 3rem;
        text-align: center;
        transition: all 0.4s;
        position: relative;
        overflow: hidden;
    }
    
    .feature-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        opacity: 0;
        transition: opacity 0.4s;
    }
    
    .feature-card:hover::before {
        opacity: 1;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.3);
    }
    
    .feature-icon {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        filter: grayscale(100%);
        opacity: 0.7;
        transition: all 0.4s;
    }
    
    .feature-card:hover .feature-icon {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.1);
    }
    
    .feature-title {
        font-size: 1.5rem;
        font-weight: 900;
        color: white;
        margin-bottom: 1rem;
    }
    
    .feature-description {
        font-size: 1.05rem;
        color: rgba(255, 255, 255, 0.6);
        line-height: 1.8;
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <div class="hero-bg"></div>
    <div class="hero-particles"></div>
    
    <div class="hero-content">
        <div class="hero-badge">🏆 المنصة الأولى للسكن في عُمان</div>
        <h1 class="hero-title">تجربة سكن استثنائية<br>تبدأ من هنا</h1>
        <p class="hero-subtitle">اكتشف آلاف الخيارات المميزة واحجز بكل ثقة</p>
        
        <div class="search-box">
            <div class="search-tabs">
                <button class="search-tab active">
                    <span>🏠</span>
                    <span>السكنات</span>
                </button>
                <button class="search-tab" onclick="window.location.href='{{ route('transports.index') }}'">
                    <span>🚗</span>
                    <span>النقل</span>
                </button>
            </div>
            
            <form action="{{ route('accommodations.index') }}" method="GET" class="search-form">
                <select name="city" class="form-field">
                    <option value="">اختر المدينة</option>
                    <option value="مسقط">مسقط</option>
                    <option value="صلالة">صلالة</option>
                    <option value="صحار">صحار</option>
                    <option value="نزوى">نزوى</option>
                </select>
                
                <select name="type" class="form-field">
                    <option value="">نوع السكن</option>
                    <option value="شقة">شقة</option>
                    <option value="غرفة">غرفة</option>
                    <option value="استوديو">استوديو</option>
                    <option value="فيلا">فيلا</option>
                </select>
                
                <input type="number" name="max_price" class="form-field" placeholder="الميزانية (ر.ع)">
                
                <button type="submit" class="btn-search">بحث</button>
            </form>
        </div>
    </div>
</div>

<div class="section-header">
    <div class="section-label">🌟 اكتشف</div>
    <h2 class="section-title">وجهات استثنائية</h2>
    <p class="section-subtitle">أفضل المدن للطلاب والمغتربين</p>
</div>

<div class="destinations-grid">
    <div class="destination-card">
        <div class="destination-bg">🏙️</div>
        <div class="destination-overlay">
            <div class="destination-name">مسقط</div>
            <div class="destination-count">250+ سكن فاخر</div>
        </div>
    </div>
    
    <div class="destination-card">
        <div class="destination-bg">🌴</div>
        <div class="destination-overlay">
            <div class="destination-name">صلالة</div>
            <div class="destination-count">120+ سكن مميز</div>
        </div>
    </div>
    
    <div class="destination-card">
        <div class="destination-bg">⛰️</div>
        <div class="destination-overlay">
            <div class="destination-name">صحار</div>
            <div class="destination-count">80+ سكن عصري</div>
        </div>
    </div>
    
    <div class="destination-card">
        <div class="destination-bg">🕌</div>
        <div class="destination-overlay">
            <div class="destination-name">نزوى</div>
            <div class="destination-count">50+ سكن راقي</div>
        </div>
    </div>
</div>

<div class="section-header">
    <div class="section-label">✨ التميز</div>
    <h2 class="section-title">لماذا SafeStay؟</h2>
    <p class="section-subtitle">نقدم لك أفضل تجربة حجز</p>
</div>

<div class="features-grid">
    <div class="feature-card">
        <div class="feature-icon">🎯</div>
        <h3 class="feature-title">دقة في الاختيار</h3>
        <p class="feature-description">خيارات منتقاة بعناية تناسب جميع الاحتياجات والميزانيات</p>
    </div>
    
    <div class="feature-card">
        <div class="feature-icon">⚡</div>
        <h3 class="feature-title">حجز فوري</h3>
        <p class="feature-description">تأكيد فوري لحجزك خلال ثوانٍ بدون انتظار</p>
    </div>
    
    <div class="feature-card">
        <div class="feature-icon">🛡️</div>
        <h3 class="feature-title">أمان مطلق</h3>
        <p class="feature-description">معاملات محمية بأحدث تقنيات الأمان العالمية</p>
    </div>
    
    <div class="feature-card">
        <div class="feature-icon">💎</div>
        <h3 class="feature-title">جودة مضمونة</h3>
        <p class="feature-description">جميع السكنات معتمدة ومفحوصة بعناية</p>
    </div>
    
    <div class="feature-card">
        <div class="feature-icon">🌟</div>
        <h3 class="feature-title">تقييمات حقيقية</h3>
        <p class="feature-description">آراء صادقة من عملاء حقيقيين</p>
    </div>
    
    <div class="feature-card">
        <div class="feature-icon">🚀</div>
        <h3 class="feature-title">دعم استثنائي</h3>
        <p class="feature-description">فريق محترف جاهز لمساعدتك 24/7</p>
    </div>
</div>
@endsection