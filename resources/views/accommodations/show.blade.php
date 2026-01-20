@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/accommodations.css') }}">
@endpush

@section('content')

<div class="detail-card">

    <div class="detail-header">
        <h1 class="detail-title">
            <i class="bi bi-house-door"></i>
            {{ $accommodation->title }}
        </h1>
        <span class="detail-type">{{ $accommodation->type }}</span>
    </div>

    <div class="detail-image">
        <i class="bi bi-house"></i>
    </div>

    <div class="detail-section">
        <h3><i class="bi bi-card-text"></i> الوصف</h3>
        <p>{{ $accommodation->description }}</p>
    </div>

    <div class="price-section">
        <i class="bi bi-cash-stack"></i>
        {{ number_format($accommodation->price_monthly,0) }} ر.ع
    </div>

    <div class="detail-grid">
        <div>
            <h3><i class="bi bi-geo-alt"></i> الموقع</h3>
            <p>{{ $accommodation->city }} - {{ $accommodation->district }}</p>
            <p>{{ $accommodation->address }}</p>
        </div>

        <div>
            <h3><i class="bi bi-info-circle"></i> معلومات</h3>
            <p><i class="bi bi-people"></i> {{ $accommodation->capacity }} أشخاص</p>
            <p><i class="bi bi-telephone"></i> {{ $accommodation->contact_phone }}</p>
            @if($accommodation->contact_email)
                <p><i class="bi bi-envelope"></i> {{ $accommodation->contact_email }}</p>
            @endif
        </div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('bookings.create') }}?accommodation_id={{ $accommodation->id }}" class="btn btn-book">
            <i class="bi bi-calendar-check"></i>
            احجز الآن
        </a>

        <a href="{{ route('accommodations.index') }}" class="btn btn-back">
            <i class="bi bi-arrow-right"></i>
            رجوع
        </a>
    </div>

    <div class="reviews-section">
        <h2>
            <i class="bi bi-star-fill"></i>
            التقييمات
        </h2>

        @forelse($accommodation->reviews as $review)
            <div class="review-card">
                <strong>{{ $review->reviewer_name }}</strong>
                <div>
                    @for($i=0;$i<$review->rating;$i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                </div>
                <p>{{ $review->comment }}</p>
            </div>
        @empty
            <p>لا توجد تقييمات بعد</p>
        @endforelse
    </div>

</div>

@endsection
