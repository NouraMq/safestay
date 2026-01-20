<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Accommodation;
use App\Models\Transport;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // عرض جميع التقييمات
    public function index()
    {
        $reviews = Review::with(['accommodation', 'transport'])->get();
        return view('reviews.index', compact('reviews'));
    }

    // عرض نموذج إضافة تقييم
    public function create()
    {
        $accommodations = Accommodation::all();
        $transports = Transport::all();
        return view('reviews.create', compact('accommodations', 'transports'));
    }

    // حفظ تقييم جديد
    public function store(Request $request)
    {
        $request->validate([
            'reviewer_name' => 'required|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        // التأكد من وجود إما سكن أو نقل
        if (!$request->accommodation_id && !$request->transport_id) {
            return back()->withErrors(['error' => 'يجب اختيار سكن أو خدمة نقل']);
        }

        Review::create($request->all());

        // الرجوع لصفحة التفاصيل
        if ($request->accommodation_id) {
            return redirect()->route('accommodations.show', $request->accommodation_id)
                ->with('success', 'شكراً لتقييمك! ⭐');
        } else {
            return redirect()->route('transports.show', $request->transport_id)
                ->with('success', 'شكراً لتقييمك! ⭐');
        }
    }

    // حذف التقييم
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'تم حذف التقييم بنجاح! 🗑️');
    }
}