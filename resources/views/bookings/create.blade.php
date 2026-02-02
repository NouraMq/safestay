@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@endpush

@section('content')

<div class="form-card">
    <h1 class="form-title"><i class="bi bi-calendar-plus"></i> إنشاء حجز جديد</h1>
    
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        
        <div class="section-title"><i class="bi bi-person-circle"></i> معلومات العميل</div>
        
        <div class="form-group">
            <label for="customer_name"><i class="bi bi-pencil-square"></i> الاسم الكامل *</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required placeholder="أدخل الاسم الكامل">
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="customer_phone"><i class="bi bi-telephone"></i> رقم الهاتف *</label>
                <input type="tel" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}" required placeholder="+968 1234 5678">
            </div>
            
            <div class="form-group">
                <label for="customer_email"><i class="bi bi-envelope"></i> البريد الإلكتروني *</label>
                <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email') }}" required placeholder="example@email.com">
            </div>
        </div>
        
        <div class="section-title"><i class="bi bi-building"></i> اختيار السكن أو النقل</div>
        
        <div class="form-group">
            <label for="accommodation_id"><i class="bi bi-house-door"></i> السكن (اختياري)</label>
            <select name="accommodation_id" id="accommodation_id">
                <option value="">-- اختر سكن --</option>
                @foreach($accommodations as $accommodation)
                    <option value="{{ $accommodation->id }}" {{ request('accommodation_id') == $accommodation->id ? 'selected' : '' }}>
                        {{ $accommodation->title }} - {{ $accommodation->city }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="transport_id"><i class="bi bi-car-front"></i> خدمة النقل (اختياري)</label>
            <select name="transport_id" id="transport_id">
                <option value="">-- اختر خدمة نقل --</option>
                @foreach($transports as $transport)
                    <option value="{{ $transport->id }}" {{ request('transport_id') == $transport->id ? 'selected' : '' }}>
                        {{ $transport->driver_name }} - {{ $transport->vehicle_type }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="section-title"><i class="bi bi-calendar-event"></i> التواريخ</div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="booking_date"><i class="bi bi-calendar-check"></i> تاريخ الحجز *</label>
                <input type="date" name="booking_date" id="booking_date" value="{{ old('booking_date', date('Y-m-d')) }}" required>
            </div>
            
            <div class="form-group">
                <label for="start_date"><i class="bi bi-play-circle"></i> تاريخ البداية *</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="end_date"><i class="bi bi-stop-circle"></i> تاريخ النهاية (اختياري)</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
        </div>
        
        <div class="form-group">
            <label for="notes"><i class="bi bi-sticky"></i> ملاحظات إضافية</label>
            <textarea name="notes" id="notes" rows="4" placeholder="أضف أي ملاحظات إضافية هنا...">{{ old('notes') }}</textarea>
        </div>
        
        <button type="submit" class="btn-submit"><i class="bi bi-check-circle"></i> تأكيد الحجز</button>
        <a href="{{ route('bookings.index') }}" class="btn-cancel"><i class="bi bi-x-circle"></i> إلغاء</a>
    </form>
</div>
@endsection