<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.review');
    }

    public function statistic() {
        return view('admin.statistic');
    }
}
