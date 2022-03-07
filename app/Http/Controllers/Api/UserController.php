<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        $profiles = User::all();
        return response()->json($profiles);
    }

    public function show($profile_id){
        $profiles = User::where('id', $profile_id)->with(['job_roles'])->get();
        return response()->json($profiles);
    }
}
