<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        return view('admin.home');
    }

    public function message() {

        $profile = Auth::user();

        $messages = Message::where('user_id', $profile->id)
                    ->orderBy('date','DESC')
                    ->paginate(3);

        return view('admin.profile.message',compact('messages'));
    }

    public function review() {

        $profile = Auth::user();

        $reviews = Review::where('user_id', $profile->id)->paginate(3);
            
        return view('admin.profile.review',compact('reviews', 'profile'));
    }

    public function statistic() {

        return view('admin.profile.statistic');
    }
}
