@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endpush

@section('content')

<div class="form-card">
    <h1 class="form-title">✏️ تعديل الحجز</h1>
    
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="customer_name">الاسم الكامل *</label>
            <input type="text" name="customer_name" id="customer_name" 
                   value="{{ old('customer_name', $booking->customer_name) }}" required>
        </div>

        <div class="form-group">
            <label for="customer_phone">رقم الهاتف *</label>
            <input type="tel" name="customer_phone" id="customer_phone" 
                   value="{{ old('customer_phone', $booking->customer_phone) }}" required>
        </div>

        <div class="form-group">
            <label for="customer_email">البريد الإلكتروني *</label>
            <input type="email" name="customer_email" id="customer_email" 
                   value="{{ old('customer_email', $booking->customer_email) }}" required>
        </div>

        <div class="form-group">
            <label for="accommodation_id">السكن</label>
            <select name="accommodation_id" id="accommodation_id">
                <option value="">-- اختر سكن --</option>
                @foreach($accommodations as $accommodation)
                    <option value="{{ $accommodation->id }}" 
                        {{ $booking->accommodation_id == $accommodation->id ? 'selected' : '' }}>
                        {{ $accommodation->title }} - {{ $accommodation->city }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="transport_id">خدمة النقل</label>
            <select name="transport_id" id="transport_id">
                <option value="">-- اختر خدمة نقل --</option>
                @foreach($transports as $transport)
                    <option value="{{ $transport->id }}" 
                        {{ $booking->transport_id == $transport->id ? 'selected' : '' }}>
                        {{ $transport->driver_name }} - {{ $transport->vehicle_type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">تاريخ البداية *</label>
            <input type="date" name="start_date" id="start_date" 
                   value="{{ old('start_date', $booking->start_date->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">تاريخ النهاية</label>
            <input type="date" name="end_date" id="end_date" 
                   value="{{ old('end_date', optional($booking->end_date)->format('Y-m-d')) }}">
        </div>

        <div class="form-group">
            <label for="status">الحالة *</label>
            <select name="status" id="status" required>
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>ملغي</option>
            </select>
        </div>

        <div class="form-group">
            <label for="notes">ملاحظات</label>
            <textarea name="notes" id="notes" rows="4">{{ old('notes', $booking->notes) }}</textarea>
        </div>

        <button type="submit" class="btn-submit">💾 حفظ التعديلات</button>
        <a href="{{ route('bookings.index') }}" class="btn-cancel">❌ إلغاء</a>
    </form>
</div>

@endsection
