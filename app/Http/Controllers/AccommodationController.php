<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    // عرض جميع السكنات
    public function index()
    {
        $accommodations = Accommodation::with('reviews')
            ->where('is_available', true)
            ->get();

        return view('accommodations.index', compact('accommodations'));
    }

    public function create()
    {
        return view('accommodations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'price_monthly' => 'required|numeric',
            'capacity' => 'required|integer',
            'contact_phone' => 'required'
        ]);

        Accommodation::create($request->all());

        return redirect()->route('accommodations.index')
            ->with('success', 'تم إضافة السكن بنجاح! ✅');
    }

    public function show($id)
    {
        $accommodation = Accommodation::with('reviews')->findOrFail($id);
        return view('accommodations.show', compact('accommodation'));
    }

    public function edit($id)
    {
        $accommodation = Accommodation::findOrFail($id);
        return view('accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'price_monthly' => 'required|numeric',
            'capacity' => 'required|integer',
            'contact_phone' => 'required'
        ]);

        $accommodation = Accommodation::findOrFail($id);
        $accommodation->update($request->all());

        return redirect()->route('accommodations.index')
            ->with('success', 'تم تحديث السكن بنجاح! ✅');
    }

    public function destroy($id)
    {
        $accommodation = Accommodation::findOrFail($id);
        $accommodation->delete();

        return redirect()->route('accommodations.index')
            ->with('success', 'تم حذف السكن بنجاح! 🗑️');
    }

    public function search(Request $request)
    {
        $query = Accommodation::query();

        if ($request->city) {
            $query->where('city', $request->city);
        }

        if ($request->district) {
            $query->where('district', 'like', '%' . $request->district . '%');
        }

        if ($request->type) {
            $query->where('type', $request->type);
        }

        if ($request->max_price) {
            $query->where('price_monthly', '<=', $request->max_price);
        }

        $accommodations = $query
            ->where('is_available', true)
            ->get();

        return view('accommodations.index', compact('accommodations'));
    }
}
