@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/accommodations.css') }}">
@endpush

@section('content')
<div class="form-card">
    <h1 class="form-title">✏️ تعديل السكن</h1>
    
    <form action="{{ route('accommodations.update', $accommodation->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">عنوان السكن *</label>
            <input type="text" name="title" id="title" value="{{ old('title', $accommodation->title) }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">الوصف *</label>
            <textarea name="description" id="description" required>{{ old('description', $accommodation->description) }}</textarea>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="type">نوع السكن *</label>
                <select name="type" id="type" required>
                    <option value="شقة" {{ $accommodation->type == 'شقة' ? 'selected' : '' }}>شقة</option>
                    <option value="غرفة" {{ $accommodation->type == 'غرفة' ? 'selected' : '' }}>غرفة</option>
                    <option value="استوديو" {{ $accommodation->type == 'استوديو' ? 'selected' : '' }}>استوديو</option>
                    <option value="فيلا" {{ $accommodation->type == 'فيلا' ? 'selected' : '' }}>فيلا</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="capacity">عدد الأشخاص *</label>
                <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $accommodation->capacity) }}" min="1" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="city">المدينة *</label>
                <input type="text" name="city" id="city" value="{{ old('city', $accommodation->city) }}" required>
            </div>
            
            <div class="form-group">
                <label for="district">الحي/المنطقة *</label>
                <input type="text" name="district" id="district" value="{{ old('district', $accommodation->district) }}" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="address">العنوان الكامل *</label>
            <input type="text" name="address" id="address" value="{{ old('address', $accommodation->address) }}" required>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="price_monthly">السعر الشهري (ر.ع) *</label>
                <input type="number" name="price_monthly" id="price_monthly" value="{{ old('price_monthly', $accommodation->price_monthly) }}" step="0.01" required>
            </div>
            
            <div class="form-group">
                <label for="contact_phone">رقم الهاتف *</label>
                <input type="tel" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $accommodation->contact_phone) }}" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="contact_email">البريد الإلكتروني</label>
            <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $accommodation->contact_email) }}">
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" name="is_available" id="is_available" value="1" {{ $accommodation->is_available ? 'checked' : '' }}>
            <label for="is_available" style="margin: 0;">متاح للحجز</label>
        </div>
        
        <button type="submit" class="btn-submit">💾 حفظ التعديلات</button>
        <a href="{{ route('accommodations.show', $accommodation->id) }}" class="btn-cancel">❌ إلغاء</a>
    </form>
</div>
@endsection