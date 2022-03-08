<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Job_role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class Job_roleController extends Controller
{
    public function index() {

        $job_roles = Job_role::all();

        return response()->json($job_roles);
    }

    public function search($job_role) {

        $profiles = Job_role::with(['users'])
                                ->where('name', 'like', '%' . $job_role . '%')
                                ->get();
        
        $profiles->each(function($job_role) {
            $job_role->users->each(function($user) {
                $user->avatar_path = $this->getAvatarPath($user->avatar_path);
                $user->cv_path = $this->getCvPath($user->cv_path);
            });
        }); 

        return response()->json($profiles);
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
