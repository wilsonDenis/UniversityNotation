<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with(['university', 'user'])->get();
        return view('admin.ratings.ratingspage', compact('ratings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'university_id' => 'required|exists:university,id',
            'score' => 'required|numeric|min:1|max:5'
        ]);

        Rating::create($request->all());

        return redirect()->back()->with('success', 'Rating added successfully.');
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();
        return redirect()->back()->with('success', 'Rating deleted successfully.');
    }
}
