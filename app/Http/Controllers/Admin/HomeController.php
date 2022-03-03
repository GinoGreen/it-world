<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        $profile = Auth::user();

        return view('admin.home', compact('profile'));
    }

    public function message() {
        return view('admin.message');
    }

    public function review() {
        $profile = Auth::user();
        $reviews = Review::where('user_id', $profile->id)->paginate(3);
            
        return view('admin.review',compact('reviews'));
    }

    public function statistic() {
        return view('admin.statistic');
    }
}
