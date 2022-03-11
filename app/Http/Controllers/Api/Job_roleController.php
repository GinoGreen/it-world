<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Job_role;
use App\Review;
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

        $reviews = Review::all();

        foreach ($profiles as $job_role) {

            foreach ($job_role->users as $user) {
                $new_review_length = 0;
                $sum_reviews = 0;
                $vote_average = null;

                foreach ($reviews as $review) {
                    if ($review->user_id === $user->id) {
                        $new_review_length = $new_review_length + 1;
                        $sum_reviews = $sum_reviews + $review->vote;
                    }
                }
                if ($new_review_length > 0) {
                    $vote_average = round($sum_reviews / $new_review_length, 1);
                    $user->reviews_length = $new_review_length;
                    $user->vote_average = $vote_average;
                }

                //premium
                if (count($user->premium_plans) > 0) {
                    $user->premium = true;
                }
            }
        }
        
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
