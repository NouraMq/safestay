@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endpush

@section('content')

<div class="page-header">
    <h1 class="page-title">📅 جميع الحجوزات</h1>
    <a href="{{ route('bookings.create') }}" class="btn-add">➕ حجز جديد</a>
</div>

@if($bookings->isEmpty())
    <div class="card" style="background: white; padding: 3rem; text-align: center;">
        <h2 style="color: #667eea;">لا توجد حجوزات</h2>
        <p style="color: #666;">ابدأ بإنشاء حجز جديد!</p>
    </div>
@else
    <div class="bookings-list">
        @foreach($bookings as $booking)
            <div class="booking-card">
                <div class="booking-header">
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
                
                <div class="booking-grid">
                    <div class="booking-section">
                        <h4>👤 معلومات العميل</h4>
                        <div class="info-line">
                            📝 <strong>الاسم:</strong> {{ $booking->customer_name }}
                        </div>
                        <div class="info-line">
                            📞 <strong>الهاتف:</strong> {{ $booking->customer_phone }}
                        </div>
                        <div class="info-line">
                            📧 <strong>البريد:</strong> {{ $booking->customer_email }}
                        </div>
                    </div>
                    
                    @if($booking->accommodation)
                    <div class="booking-section">
                        <h4>🏠 السكن المحجوز</h4>
                        <div class="info-line">
                            {{ $booking->accommodation->title }}
                        </div>
                        <div class="info-line">
                            📍 {{ $booking->accommodation->city }}
                        </div>
                    </div>
                    @endif
                    
                    @if($booking->transport)
                    <div class="booking-section">
                        <h4>🚗 خدمة النقل</h4>
                        <div class="info-line">
                            {{ $booking->transport->driver_name }}
                        </div>
                        <div class="info-line">
                            {{ $booking->transport->vehicle_type }}
                        </div>
                    </div>
                    @endif
                    
                    <div class="booking-section">
                        <h4>📅 التواريخ</h4>
                        <div class="info-line">
                            🗓️ <strong>تاريخ الحجز:</strong> {{ $booking->booking_date->format('Y-m-d') }}
                        </div>
                        <div class="info-line">
                            🔵 <strong>البداية:</strong> {{ $booking->start_date->format('Y-m-d') }}
                        </div>
                        @if($booking->end_date)
                        <div class="info-line">
                            🔴 <strong>النهاية:</strong> {{ $booking->end_date->format('Y-m-d') }}
                        </div>
                        @endif
                    </div>
                </div>
                
                @if($booking->notes)
                <div class="booking-section">
                    <h4>📝 ملاحظات</h4>
                    <p style="color: #666;">{{ $booking->notes }}</p>
                </div>
                @endif
                
                <div class="booking-actions">
                    <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-view">
                        👁️ عرض التفاصيل
                    </a>
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-edit">
                        ✏️ تعديل
                    </a>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('هل تريد إلغاء الحجز؟')" style="width: 100%;">
                            🗑️ إلغاء الحجز
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection