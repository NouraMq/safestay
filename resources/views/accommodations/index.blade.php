@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/accommodations.css') }}">
@endpush

@section('content')

<div class="page-header">
    <h1 class="page-title">
        <i class="bi bi-house-door"></i>
        السكنات المتاحة في عُمان
    </h1>
    <p class="results-count">{{ $accommodations->count() }} سكن متاح</p>
</div>

@if($accommodations->isEmpty())
    <div class="empty-state">
        <i class="bi bi-house-x"></i>
        <h2>لا توجد سكنات</h2>
    </div>
@else

<div class="accommodations-list">

    @foreach($accommodations as $accommodation)
    <div class="accommodation-card">

        <!-- IMAGE CAROUSEL -->
        <div class="card-image">
            <div id="carousel-{{ $accommodation->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994" alt="house">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1502673530728-f79b4cab31b1" alt="house">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6" alt="house">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="house">
                    </div>
                </div>

                <!-- CONTROLS -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $accommodation->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $accommodation->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

        <!-- CARD CONTENT -->
        <div class="card-content">
            <h3 class="card-title">{{ $accommodation->title }}</h3>

            <div class="card-location">
                <i class="bi bi-geo-alt"></i>
                {{ $accommodation->city }} - {{ $accommodation->district }}
            </div>

            <span class="card-type">{{ $accommodation->type }}</span>

            <div class="card-features">
                <i class="bi bi-people"></i>
                يتسع لـ {{ $accommodation->capacity }} أشخاص
            </div>

            <div class="card-footer">
                <div class="price-amount">{{ number_format($accommodation->price_monthly,0) }} ر.ع</div>
                <a href="{{ route('accommodations.show', $accommodation->id) }}" class="btn-view">عرض التفاصيل</a>
            </div>
        </div>

    </div>
    @endforeach

</div>
@endif

@endsection
