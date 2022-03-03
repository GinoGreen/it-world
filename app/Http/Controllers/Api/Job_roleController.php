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

        return response()->json($profiles);
    }
}
