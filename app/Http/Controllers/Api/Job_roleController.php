<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Job_role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class Job_roleController extends Controller
{
    public function index() {

        $job_roles = Job_role::all();

        return response()->json($job_roles);
    }

    public function search($job_role) {

        $job_roles = Job_role::where('name', 'like', '%' . $job_role . '%')->get();

        return response()->json($job_roles);
    }

    public function usera(){

        // $user = DB::table('users')
        //                 ->join('job_roles',)
        //                 ->select('*')
        //                 ;
        $user = ["saluto" => "ciao"];
        
        

        return response()->json($user);
    }
    public function prova(){

        // $user = DB::table('users')
        //                 ->join('job_roles',)
        //                 ->select('*')
        //                 ;
        $prova = ["saluto" => "ciao"];
        
        

        return response()->json($prova);
    }
}
