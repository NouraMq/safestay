@extends('layouts.app')

@section('title', 'من نحن - SafeStay')

@section('styles')
<style>
    .page-container {
        max-width: 1000px;
        margin: 3rem auto;
        padding: 0 2rem;
    }
    
    .page-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .page-badge {
        display: inline-block;
        padding: 0.5rem 1.2rem;
        background: rgba(102, 126, 234, 0.15);
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 700;
        color: #667eea;
        margin-bottom: 1rem;
    }
    
    .page-title {
        font-size: 3.5rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #fff 0%, rgba(255, 255, 255, 0.7) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .page-subtitle {
        font-size: 1.3rem;
        color: rgba(255, 255, 255, 0.6);
        line-height: 1.6;
    }
    
    .content-section {
        background: rgba(26, 26, 46, 0.7);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 3rem;
        margin-bottom: 2rem;
    }
    
    .content-section h2 {
        font-size: 2rem;
        font-weight: 900;
        color: white;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.7rem;
    }
    
    .content-section p {
        font-size: 1.15rem;
        line-height: 2;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 1.5rem;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }
    
    .stat-card {
        background: rgba(102, 126, 234, 0.1);
        padding: 2rem;
        border-radius: 16px;
        text-align: center;
        border: 1px solid rgba(102, 126, 234, 0.2);
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 600;
    }
    
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }
    
    .value-item {
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        border-right: 4px solid #667eea;
    }
    
    .value-item h3 {
        font-size: 1.3rem;
        color: white;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }
    
    .value-item p {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.7;
        margin: 0;
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="page-header">
        <div class="page-badge">🏠 من نحن</div>
        <h1 class="page-title">SafeStay</h1>
        <p class="page-subtitle">منصتك الموثوقة لحجز السكن والنقل في عُمان</p>
    </div>
    
    <div class="content-section">
        <h2>🎯 رؤيتنا</h2>
        <p>
            نؤمن في SafeStay بأن كل طالب ومغترب يستحق سكناً آمناً ومريحاً ونقلاً موثوقاً. 
            نسعى لأن نكون المنصة الأولى في سلطنة عُمان التي تربط الطلاب والمغتربين بأفضل 
            خيارات السكن وخدمات النقل بكل سهولة وأمان.
        </p>
        
        <p>
            منذ تأسيسنا، ساعدنا الآلاف من الطلاب والمغتربين في إيجاد سكنهم المثالي 
            وخدمات النقل الموثوقة، مما يتيح لهم التركيز على دراستهم وعملهم دون قلق.
        </p>
    </div>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">500+</div>
            <div class="stat-label">سكن متاح</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">50+</div>
            <div class="stat-label">سائق محترف</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">1000+</div>
            <div class="stat-label">عميل راضٍ</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">24/7</div>
            <div class="stat-label">دعم متواصل</div>
        </div>
    </div>
    
    <div class="content-section">
        <h2>💎 قيمنا</h2>
        <div class="values-grid">
            <div class="value-item">
                <h3>الأمان</h3>
                <p>نضمن أمان جميع معاملاتك وحماية بياناتك الشخصية</p>
            </div>
            <div class="value-item">
                <h3>الشفافية</h3>
                <p>أسعار واضحة بدون رسوم خفية أو مفاجآت</p>
            </div>
            <div class="value-item">
                <h3>الجودة</h3>
                <p>جميع السكنات وخدمات النقل معتمدة ومفحوصة</p>
            </div>
            <div class="value-item">
                <h3>الدعم</h3>
                <p>فريق محترف جاهز لمساعدتك في أي وقت</p>
            </div>
        </div>
    </div>
    
    <div class="content-section">
        <h2>🚀 مهمتنا</h2>
        <p>
            مهمتنا هي تسهيل حياة الطلاب والمغتربين في عُمان من خلال توفير منصة موثوقة 
            وسهلة الاستخدام تجمع أفضل خيارات السكن وخدمات النقل في مكان واحد. نعمل 
            باستمرار على تحسين خدماتنا وإضافة ميزات جديدة لتلبية احتياجاتكم.
        </p>
        
        <p>
            نحن ملتزمون ببناء مجتمع آمن وموثوق حيث يمكن للجميع العثور على ما يحتاجونه 
            بكل راحة وثقة.
        </p>
    </div>
</div>
@endsection