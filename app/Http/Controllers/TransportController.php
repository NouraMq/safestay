<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    // عرض جميع خدمات النقل
        public function index()
    {
        $transports = Transport::with('reviews')->get();
        return view('transports.index', compact('transports'));
    }

    // عرض نموذج الإضافة
    public function create()
    {
        return view('transports.create');
    }

    // حفظ خدمة نقل جديدة
    public function store(Request $request)
    {
        $request->validate([
            'driver_name' => 'required|max:255',
            'vehicle_type' => 'required',
            'vehicle_model' => 'required',
            'license_plate' => 'required',
            'city' => 'required',
            'service_area' => 'required',
            'price_per_km' => 'required|numeric',
            'base_price' => 'required|numeric',
            'capacity' => 'required|integer',
            'contact_phone' => 'required'
        ]);

        Transport::create($request->all());

        return redirect()->route('transports.index')
            ->with('success', 'تم إضافة خدمة النقل بنجاح! 🚗');
    }

    // عرض تفاصيل خدمة نقل
    public function show($id)
    {
        $transport = Transport::with('reviews')->findOrFail($id);
        return view('transports.show', compact('transport'));
    }

    // عرض نموذج التعديل
    public function edit($id)
    {
        $transport = Transport::findOrFail($id);
        return view('transports.edit', compact('transport'));
    }

    // تحديث خدمة النقل
    public function update(Request $request, $id)
    {
        $request->validate([
            'driver_name' => 'required|max:255',
            'vehicle_type' => 'required',
            'vehicle_model' => 'required',
            'license_plate' => 'required',
            'city' => 'required',
            'service_area' => 'required',
            'price_per_km' => 'required|numeric',
            'base_price' => 'required|numeric',
            'capacity' => 'required|integer',
            'contact_phone' => 'required'
        ]);

        $transport = Transport::findOrFail($id);
        $transport->update($request->all());

        return redirect()->route('transports.index')
            ->with('success', 'تم تحديث خدمة النقل بنجاح! ✅');
    }

    // حذف خدمة النقل
    public function destroy($id)
    {
        $transport = Transport::findOrFail($id);
        $transport->delete();

        return redirect()->route('transports.index')
            ->with('success', 'تم حذف خدمة النقل بنجاح! 🗑️');
    }
}