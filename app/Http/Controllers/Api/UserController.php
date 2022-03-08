<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        $profiles = User::all();

        $profiles->each(function($profile) {
            $profile->avatar_path = $this->getAvatarPath($profile->avatar_path);
            $profile->cv_path = $this->getCvPath($profile->cv_path);
        });

        return response()->json($profiles);
    }

    public function show($profile_id){
        $profile = User::where('id', $profile_id)->with(['job_roles', 'reviews'])->first();

        $profile->avatar_path = $this->getAvatarPath($profile->avatar_path);
        $profile->cv_path = $this->getCvPath($profile->cv_path);

        return response()->json($profile);
    }

    public function getAvatarPath($file) {
        if ($file) {
            $file = url('storage/' . $file);
        } else {
            $file = url('img/slider/undraw_profile_pic_ic-5-t.svg');
        }
        return $file;
    }

    public function getCvPath($file) {
        if ($file) {
            $file = url('storage/' . $file);
            return $file;
        }
    }
}
