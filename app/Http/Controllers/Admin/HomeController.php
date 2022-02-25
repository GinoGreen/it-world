<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('admin.home');
    }

    public function edit() {
        return view('admin.edit');
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
