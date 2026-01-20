<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\Transport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    // عرض جميع الحجوزات
    public function index()
    {
        $bookings = Booking::with(['accommodation', 'transport'])->get();
        return view('bookings.index', compact('bookings'));
    }

    // عرض نموذج الحجز
    public function create()
    {
        $accommodations = Accommodation::where('is_available', true)->get();
        $transports = Transport::where('is_available', true)->get();
        return view('bookings.create', compact('accommodations', 'transports'));
    }

    // حفظ حجز جديد
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|max:255',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            'start_date' => 'required|date',
            'booking_date' => 'required|date'
        ]);

        // التأكد من وجود إما سكن أو نقل
        if (!$request->accommodation_id && !$request->transport_id) {
            return back()->withErrors(['error' => 'يجب اختيار سكن أو خدمة نقل على الأقل']);
        }

        Booking::create($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'تم إنشاء الحجز بنجاح! 📅');
    }

    // عرض تفاصيل حجز
    public function show($id)
    {
        $booking = Booking::with(['accommodation', 'transport'])->findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    // عرض نموذج التعديل
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $accommodations = Accommodation::where('is_available', true)->get();
        $transports = Transport::where('is_available', true)->get();
        return view('bookings.edit', compact('booking', 'accommodations', 'transports'));
    }

    // تحديث الحجز
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|max:255',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            'start_date' => 'required|date',
            'status' => 'required'
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'تم تحديث الحجز بنجاح! ✅');
    }

    // حذف الحجز
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'تم إلغاء الحجز بنجاح! 🗑️');
    }
    // طباعة الحجز كـ PDF
// طباعة الحجز كـ PDF

public function printPDF($id)
{
    // Get booking with related accommodation and transport
    $booking = Booking::with(['accommodation', 'transport'])->findOrFail($id);

    // Load Blade view
    $pdf = Pdf::loadView('bookings.pdf', compact('booking'));

    // Optional: set default paper size and orientation
    $pdf->setPaper('a4', 'portrait');
$pdf->setOptions([
    'isHtml5ParserEnabled' => true,
    'isPhpEnabled' => true,
    'defaultFont' => 'Cairo', // أو 'DejaVu Sans'
]);

    // Download PDF
    return $pdf->download('booking-' . $booking->id . '.pdf');
}
}