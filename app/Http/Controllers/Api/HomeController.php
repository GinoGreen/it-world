<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
      
            $data = [
                [
                    "nome"=>"mario",
                    "cognome"=>"rossi"
                ]    
            ];
    
            return response()->json($data);
       
    }
}
