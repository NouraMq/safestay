<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>تأكيد الحجز #{{ $booking->id }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            direction: rtl;
            text-align: right;
            padding: 20px;
        }
        .header {
            background: #1e3a8a;
            color: white;
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
            border-radius: 10px;
        }
        .header h1 {
            margin: 0 0 10px 0;
            font-size: 32px;
        }
        .header p {
            margin: 5px 0;
            font-size: 18px;
        }
        .section {
            margin: 25px 0;
            padding: 20px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            background: #f9fafb;
        }
        .section h3 {
            color: #1e3a8a;
            border-bottom: 3px solid #1e3a8a;
            padding-bottom: 10px;
            margin-bottom: 15px;
            font-size: 22px;
        }
        .info-row {
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
            display: table;
            width: 100%;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            display: table-cell;
            width: 200px;
            color: #374151;
        }
        .value {
            display: table-cell;
            color: #1f2937;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 16px;
        }
        .status-pending {
            background: #fbbf24;
            color: #1f2937;
        }
        .status-confirmed {
            background: #10b981;
            color: white;
        }
        .status-cancelled {
            background: #ef4444;
            color: white;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            padding-top: 20px;
            border-top: 2px solid #e5e7eb;
        }
        .price-highlight {
            background: #10b981;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SafeStay</h1>
        <h2>تأكيد الحجز</h2>
        <p>رقم الحجز: #{{ $booking->id }}</p>
    </div>

    <div class="section">
        <h3>معلومات العميل</h3>
        <div class="info-row">
            <span class="label">الاسم:</span>
            <span class="value">{{ $booking->customer_name }}</span>
        </div>
        <div class="info-row">
            <span class="label">الهاتف:</span>
            <span class="value">{{ $booking->customer_phone }}</span>
        </div>
        <div class="info-row">
            <span class="label">البريد الإلكتروني:</span>
            <span class="value">{{ $booking->customer_email }}</span>
        </div>
    </div>

    @if($booking->accommodation)
    <div class="section">
        <h3>تفاصيل السكن</h3>
        <div class="info-row">
            <span class="label">العنوان:</span>
            <span class="value">{{ $booking->accommodation->title }}</span>
        </div>
        <div class="info-row">
            <span class="label">النوع:</span>
            <span class="value">{{ $booking->accommodation->type }}</span>
        </div>
        <div class="info-row">
            <span class="label">الموقع:</span>
            <span class="value">{{ $booking->accommodation->city }} - {{ $booking->accommodation->district }}</span>
        </div>
        <div class="info-row">
            <span class="label">العنوان الكامل:</span>
            <span class="value">{{ $booking->accommodation->address }}</span>
        </div>
        <div class="price-highlight">
            السعر الشهري: {{ number_format($booking->accommodation->price_monthly, 2) }} ر.ع
        </div>
        <div class="info-row">
            <span class="label">رقم التواصل:</span>
            <span class="value">{{ $booking->accommodation->contact_phone }}</span>
        </div>
    </div>
    @endif

    @if($booking->transport)
    <div class="section">
        <h3>تفاصيل النقل</h3>
        <div class="info-row">
            <span class="label">السائق:</span>
            <span class="value">{{ $booking->transport->driver_name }}</span>
        </div>
        <div class="info-row">
            <span class="label">نوع المركبة:</span>
            <span class="value">{{ $booking->transport->vehicle_type }}</span>
        </div>
        <div class="info-row">
            <span class="label">الموديل:</span>
            <span class="value">{{ $booking->transport->vehicle_model }}</span>
        </div>
        <div class="info-row">
            <span class="label">رقم اللوحة:</span>
            <span class="value">{{ $booking->transport->license_plate }}</span>
        </div>
        <div class="info-row">
            <span class="label">رقم التواصل:</span>
            <span class="value">{{ $booking->transport->contact_phone }}</span>
        </div>
    </div>
    @endif

    <div class="section">
        <h3>التواريخ</h3>
        <div class="info-row">
            <span class="label">تاريخ الحجز:</span>
            <span class="value">{{ $booking->booking_date->format('Y-m-d') }}</span>
        </div>
        <div class="info-row">
            <span class="label">تاريخ البداية:</span>
            <span class="value">{{ $booking->start_date->format('Y-m-d') }}</span>
        </div>
        @if($booking->end_date)
        <div class="info-row">
            <span class="label">تاريخ النهاية:</span>
            <span class="value">{{ $booking->end_date->format('Y-m-d') }}</span>
        </div>
        @endif
        <div class="info-row">
            <span class="label">الحالة:</span>
            <span class="value">
                <span class="status-badge status-{{ $booking->status }}">
                    @if($booking->status == 'pending')
                        قيد الانتظار
                    @elseif($booking->status == 'confirmed')
                        مؤكد
                    @else
                        ملغي
                    @endif
                </span>
            </span>
        </div>
    </div>

    @if($booking->notes)
    <div class="section">
        <h3>ملاحظات</h3>
        <p style="line-height: 1.8;">{{ $booking->notes }}</p>
    </div>
    @endif

    <div class="footer">
        <p><strong>SafeStay - منصة السكن والنقل الآمن</strong></p>
        <p>© {{ date('Y') }} جميع الحقوق محفوظة</p>
        <p>للاستفسار: support@safestay.om | 96812345678</p>
    </div>
</body>
</html>