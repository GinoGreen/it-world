<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Premium_plan;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show($profile_id){
        $profile = User::where('id', $profile_id)->with(['job_roles', 'reviews'])->first();

        $profile->avatar_path = $this->getAvatarPath($profile->avatar_path);
        $profile->cv_path = $this->getCvPath($profile->cv_path);

        return response()->json($profile);
    }

    public function evidence(){

        $profiles = User::with(['premium_plans', 'job_roles'])->get();

        $profiles_premium = [];

        foreach ($profiles as $profile) {
            if (count($profile->premium_plans) > 0) {
                $profile->avatar_path = $this->getAvatarPath($profile->avatar_path);
                $profile->cv_path = $this->getCvPath($profile->cv_path);
                array_push($profiles_premium, $profile);
                if (count($profiles_premium) === 9) {
                    break;
                }
            }
        }

        return response()->json($profiles_premium);
    }

    public function getAvatarPath($file) {
        if ($file && !str_starts_with($file, 'https://picsum.photos')) {
            $file = url('storage/' . $file);
        } else if (str_starts_with($file, 'https://picsum.photos')) {
            return $file;
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
