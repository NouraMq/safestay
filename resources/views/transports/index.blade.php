@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/transport.css') }}">
@endpush

@section('content')

<div class="page-header">
    <div class="page-badge">🚗 خدمات النقل</div>
    <h1 class="page-title">سائقون محترفون في خدمتك</h1>
    <p class="page-subtitle">{{ $transports->count() }} خدمة نقل متاحة الآن</p>
</div>

@if($transports->isEmpty())
    <div class="empty-state">
        <div class="empty-icon">🚗</div>
        <h2 class="empty-title">لا توجد خدمات نقل متاحة</h2>
        <p class="empty-text">جرب البحث بمعايير مختلفة</p>
    </div>
@else
    <div class="transports-grid">
        @foreach($transports as $transport)
            <div class="transport-card">
                <div class="card-header">
                    <div class="driver-avatar">👨‍✈️</div>
                    <div class="driver-info">
                        <h3 class="driver-name">{{ $transport->driver_name }}</h3>
                        @if($transport->reviews->count() > 0)
                            <div class="driver-rating">
                                <span class="stars">
                                    @for($i = 0; $i < floor($transport->reviews->avg('rating')); $i++)
                                        ⭐
                                    @endfor
                                </span>
                                <span class="reviews-count">({{ $transport->reviews->count() }} تقييم)</span>
                            </div>
                        @else
                            <div class="driver-rating">
                                <span class="reviews-count">سائق جديد</span>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="vehicle-info">
                        <div class="vehicle-header">
                            <div class="vehicle-icon">
                                @if($transport->vehicle_type == 'سيارة')
                                    🚗
                                @elseif($transport->vehicle_type == 'باص صغير')
                                    🚐
                                @else
                                    🚌
                                @endif
                            </div>
                            <div class="vehicle-details">
                                <h3>{{ $transport->vehicle_type }}</h3>
                                <div class="vehicle-model">{{ $transport->vehicle_model }}</div>
                            </div>
                        </div>
                        
                        <div class="vehicle-specs">
                            <div class="spec-item">
                                <div class="spec-icon">🔢</div>
                                <span>{{ $transport->license_plate }}</span>
                            </div>
                            <div class="spec-item">
                                <div class="spec-icon">👥</div>
                                <span>{{ $transport->capacity }} مقاعد</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="service-area">
                        <div class="area-label">منطقة الخدمة</div>
                        <div class="area-value">📍 {{ $transport->city }} - {{ $transport->service_area }}</div>
                    </div>
                    
                    <div class="pricing-section">
                        <div class="price-label">التسعيرة</div>
                        <div class="price-value">{{ number_format($transport->base_price, 2) }} ر.ع</div>
                        <div class="price-per-km">+ {{ number_format($transport->price_per_km, 2) }} ر.ع لكل كيلومتر</div>
                    </div>
                    
                    <div class="contact-buttons">
    <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/[^0-9]/', '', $transport->contact_phone) }}&text=مرحباً، أود حجز خدمة نقل معك" 
       target="_blank" 
       class="btn-whatsapp">
        <span class="whatsapp-icon">💬</span>
        <span>واتساب</span>
    </a>
    <a href="{{ route('transports.show', $transport->id) }}" class="btn-details">
        <span>عرض التفاصيل</span>
        <span>👁️</span>
    </a>
</div>
                      
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection