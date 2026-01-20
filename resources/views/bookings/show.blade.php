@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endpush

@section('content')

<div class="detail-card">
    <div class="detail-header">
        <div class="booking-id">📋 حجز #{{ $booking->id }}</div>
        <span class="status-badge status-{{ $booking->status }}">
            @if($booking->status == 'pending')
                ⏳ قيد الانتظار
            @elseif($booking->status == 'confirmed')
                ✅ مؤكد
            @else
                ❌ ملغي
            @endif
        </span>
    </div>

    <div class="info-section">
        <h3>👤 معلومات العميل</h3>
        <div class="info-row">
            <span class="info-label">الاسم:</span>
            <span class="info-value">{{ $booking->customer_name }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">الهاتف:</span>
            <span class="info-value">{{ $booking->customer_phone }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">البريد الإلكتروني:</span>
            <span class="info-value">{{ $booking->customer_email }}</span>
        </div>
    </div>

    @if($booking->accommodation)
    <div class="info-section">
        <h3>🏠 تفاصيل السكن</h3>
        <div class="info-row">
            <span class="info-label">العنوان:</span>
            <span class="info-value">{{ $booking->accommodation->title }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">النوع:</span>
            <span class="info-value">{{ $booking->accommodation->type }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">الموقع:</span>
            <span class="info-value">{{ $booking->accommodation->city }} - {{ $booking->accommodation->district }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">السعر الشهري:</span>
            <span class="info-value">{{ number_format($booking->accommodation->price_monthly, 2) }} ر.ع</span>
        </div>
    </div>
    @endif

    @if($booking->transport)
    <div class="info-section">
        <h3>🚗 تفاصيل النقل</h3>
        <div class="info-row">
            <span class="info-label">السائق:</span>
            <span class="info-value">{{ $booking->transport->driver_name }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">المركبة:</span>
            <span class="info-value">{{ $booking->transport->vehicle_type }} - {{ $booking->transport->vehicle_model }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">رقم اللوحة:</span>
            <span class="info-value">{{ $booking->transport->license_plate }}</span>
        </div>
    </div>
    @endif

    <div class="info-section">
        <h3>📅 التواريخ</h3>
        <div class="info-row">
            <span class="info-label">تاريخ الحجز:</span>
            <span class="info-value">{{ $booking->booking_date->format('Y-m-d') }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">تاريخ البداية:</span>
            <span class="info-value">{{ $booking->start_date->format('Y-m-d') }}</span>
        </div>
        @if($booking->end_date)
        <div class="info-row">
            <span class="info-label">تاريخ النهاية:</span>
            <span class="info-value">{{ $booking->end_date->format('Y-m-d') }}</span>
        </div>
        @endif
    </div>

    @if($booking->notes)
    <div class="info-section">
        <h3>📝 ملاحظات</h3>
        <p style="color: #666; line-height: 1.6;">{{ $booking->notes }}</p>
    </div>
    @endif

    <div class="action-buttons">
      <a href="{{ route('bookings.pdf', $booking->id) }}" class="btn btn-pdf">
    📄 تحميل PDF
</a>

        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-edit">
            ✏️ تعديل الحجز
        </a>
        <a href="{{ route('bookings.index') }}" class="btn btn-back">
            ⬅️ العودة
        </a>
    </div>
</div>
@endsection