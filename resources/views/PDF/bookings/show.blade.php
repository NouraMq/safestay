@extends('layouts.app')

@section('title', 'تفاصيل الحجز')

@section('styles')
<style>
    .detail-card {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .detail-header {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .booking-id {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    
    .status-badge {
        display: inline-block;
        padding: 0.7rem 1.5rem;
        border-radius: 25px;
        font-weight: bold;
        font-size: 1.1rem;
        margin-top: 1rem;
    }
    
    .status-pending {
        background: #ffc107;
        color: #333;
    }
    
    .status-confirmed {
        background: #28a745;
        color: white;
    }
    
    .status-cancelled {
        background: #dc3545;
        color: white;
    }
    
    .info-section {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }
    
    .info-section h3 {
        color: #667eea;
        margin-bottom: 1rem;
        font-size: 1.4rem;
        border-bottom: 2px solid #667eea;
        padding-bottom: 0.5rem;
    }
    
    .info-row {
        display: flex;
        padding: 0.7rem 0;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .info-label {
        font-weight: bold;
        min-width: 150px;
        color: #555;
    }
    
    .info-value {
        color: #333;
    }
    
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    .btn {
        padding: 1rem 2rem;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        text-align: center;
        flex: 1;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }
    
    .btn-pdf {
        background: #dc3545;
        color: white;
    }
    
    .btn-pdf:hover {
        background: #c82333;
        transform: scale(1.05);
    }
    
    .btn-edit {
        background: #ffc107;
        color: #333;
    }
    
    .btn-edit:hover {
        background: #e0a800;
    }
    
    .btn-back {
        background: #6c757d;
        color: white;
    }
    
    .btn-back:hover {
        background: #5a6268;
    }
</style>
@endsection

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