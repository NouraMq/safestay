@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/accommodations.css') }}">
@endpush

@section('content')

<div class="form-card">
    <h1 class="form-title">➕ إضافة سكن جديد</h1>

    <form action="{{ route('accommodations.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">عنوان السكن *</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف *</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="type">نوع السكن *</label>
                <select name="type" id="type" required>
                    <option value="">اختر النوع</option>
                    <option value="شقة">شقة</option>
                    <option value="غرفة">غرفة</option>
                    <option value="استوديو">استوديو</option>
                    <option value="فيلا">فيلا</option>
                </select>
            </div>
            <div class="form-group">
                <label for="capacity">عدد الأشخاص *</label>
                <input type="number" name="capacity" id="capacity" value="{{ old('capacity') }}" min="1" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="city">المدينة *</label>
                <input type="text" name="city" id="city" value="{{ old('city') }}" required>
            </div>
            <div class="form-group">
                <label for="district">الحي/المنطقة *</label>
                <input type="text" name="district" id="district" value="{{ old('district') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="address">العنوان الكامل *</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="price_monthly">السعر الشهري (ر.ع) *</label>
                <input type="number" name="price_monthly" id="price_monthly" value="{{ old('price_monthly') }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="contact_phone">رقم الهاتف *</label>
                <input type="tel" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="contact_email">البريد الإلكتروني</label>
            <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}">
        </div>

        <button type="submit" class="btn btn-submit">✅ إضافة السكن</button>
        <a href="{{ route('accommodations.index') }}" class="btn btn-cancel">❌ إلغاء</a>
    </form>
</div>

@endsection
