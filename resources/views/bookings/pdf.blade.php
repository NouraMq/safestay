<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<style>
body {
    font-family: 'Helvetica', sans-serif;
    direction: ltr;
    text-align: left;
    line-height: 1.5;
    font-size: 14px;
}

h1, h2, h3 {
    margin: 0;
}

.info-section {
    margin-bottom: 15px;
}

.info-row {
    margin-bottom: 5px;
}

.info-label {
    font-weight: bold;
}
</style>
</head>
<body>
<h1>Booking Details #{{ $booking->id }}</h1>

<div class="info-section">
    <h2>Customer Information</h2>
    <div class="info-row">Name: {{ $booking->customer_name }}</div>
    <div class="info-row">Phone: {{ $booking->customer_phone }}</div>
    <div class="info-row">Email: {{ $booking->customer_email }}</div>
</div>

@if($booking->accommodation)
<div class="info-section">
    <h2>Accommodation</h2>
    <div class="info-row">Title: {{ $booking->accommodation->title }}</div>
    <div class="info-row">City: {{ $booking->accommodation->city }}</div>
    <div class="info-row">Monthly Price: {{ number_format($booking->accommodation->price_monthly, 2) }} OMR</div>
</div>
@endif

@if($booking->transport)
<div class="info-section">
    <h2>Transport</h2>
    <div class="info-row">Driver: {{ $booking->transport->driver_name ?? 'N/A' }}</div>
    <div class="info-row">Vehicle: {{ $booking->transport->vehicle_type ?? '-' }} - {{ $booking->transport->vehicle_model ?? '-' }}</div>
    <div class="info-row">License Plate: {{ $booking->transport->license_plate ?? '-' }}</div>
</div>
@endif

<div class="info-section">
    <h2>Dates</h2>
    <div class="info-row">Booking Date: {{ $booking->booking_date->format('Y-m-d') }}</div>
    <div class="info-row">Start Date: {{ $booking->start_date->format('Y-m-d') }}</div>
    @if($booking->end_date)
    <div class="info-row">End Date: {{ $booking->end_date->format('Y-m-d') }}</div>
    @endif
</div>
</body>
</html>
