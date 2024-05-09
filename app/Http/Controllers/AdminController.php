<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Critere;
use App\Models\Rating;
use App\Models\University;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $universitiesCount = University::count();
        $criteriaCount = Critere::count();
        $ratingsCount = Rating::count();
        $commentsCount = Comment::count();

        return view('admin.dashboard', compact('universitiesCount', 'criteriaCount', 'ratingsCount'));
    }

}
