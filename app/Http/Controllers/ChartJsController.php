<?php

namespace App\Http\Controllers;

// use App\User;
use Illuminate\Http\Request;
// use App\Models\User;
// use DB;
// use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
 
class ChartJsController extends Controller
{
    public function index()
    {
        $years = [2000,2001,2002,2003,2004,2005];
        $month = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];

        $average_vote = [0.2,2,3,1,2,4,5,5,2,1.3,3,1,];
        $datas=[];
        for ($i=1; $i < 13 ; $i++) { 
            # code...
            $data = DB::table('reviews')
                ->select('vote')
                ->where('month','=',$i)
                ->where('year','=',2005)
                ->avg('vote');
            array_push($datas,$data);    
        }
        array_push($datas,0,5);
        // dd($datas);
        // foreach ($year as $key => $value) {
        //     $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        // }

    	return view('admin.chartjs',compact('years'))->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('average_vote',json_encode($datas,JSON_NUMERIC_CHECK));
    }

    public function prova($year)
    {
        $years = [2000,2001,2002,2003,2004,2005];
        $month = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];

        $average_vote = [0.2,2,3,1,2,4,5,5,2,1.3,3,1,];
        $datas=[];
        for ($i=1; $i < 13 ; $i++) { 
            # code...
            $data = DB::table('reviews')
                ->select('vote')
                ->where('month','=',$i)
                ->where('year','=',$year)
                ->avg('vote');
            array_push($datas,$data);    
        }
        array_push($datas,0,5);
        // dd($datas);
        // foreach ($year as $key => $value) {
        //     $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        // }

    	return view('admin.chartjs',compact('years'))->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('average_vote',json_encode($datas,JSON_NUMERIC_CHECK));
    }

    
}
