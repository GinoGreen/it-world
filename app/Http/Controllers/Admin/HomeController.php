<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        $profile = Auth::user();

        return view('layouts.admin', compact('profile'));
    }

    public function message() {
        
        $profile = Auth::user();

        return view('admin.profile.message', compact('profile'));
    }

    public function review() {

        $profile = Auth::user();

        return view('admin.profile.review', compact('profile'));
    }

    public function statistic() {

        $profile = Auth::user();

        return view('admin.profile.statistic', compact('profile'));
    }
}
