<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Premium_plan;
use Illuminate\Http\Request;

class Premium_planController extends Controller
{
    public function index(Request $request) {

        $plans = Premium_plan::all();

        return view('admin.profile.premium_plan', compact('plans'));
    }
}
