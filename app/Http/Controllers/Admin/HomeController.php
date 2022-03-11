<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index() {

        return view('admin.home');
    }

    public function message() {

        $profile = Auth::user();

        $messages = Message::where('user_id', $profile->id)
                    ->orderBy('created_at','DESC')
                    ->paginate(3);

        return view('admin.profile.message',compact('messages'));
    }

    public function review() {

        $profile = Auth::user();

        $reviews = Review::where('user_id', $profile->id)
                    ->orderBy('created_at', 'DESC')
                    ->paginate(3);
            
        return view('admin.profile.review',compact('reviews', 'profile'));
    }

    public function getAverageForCurrentYear() {
        $i=0;
        $years=[];
        $reviews = Review::orderBy('created_at','DESC')->get();
        foreach ($reviews as $review) {
            $year = Carbon::parse($review['created_at'])->year;
           
            if (!in_array($year,$years) && $i < 5) {
            
                array_push($years,$year);
                $i++;
            }
        }


        $months = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];

        $year_selected = $years[0];
        $average_votes=[];
        for ($i=1; $i < 13 ; $i++) { 
           
            $average_vote = DB::table('reviews')
                ->select('vote')
                ->whereMonth('created_at',$i)
                ->whereYear('created_at',$year_selected)
                ->avg('vote');
            array_push($average_votes,$average_vote);    
        }

        array_push($average_votes,0,5);
       
    	return view('admin.profile.statistics.average',compact('years','year_selected'))->with('months',json_encode($months,JSON_NUMERIC_CHECK))->with('average_vote',json_encode($average_votes,JSON_NUMERIC_CHECK));
        
    }

    public function getAverageForSelectedYear($year_selected)
    {
        $i=0;
        $years=[];
        $reviews = Review::orderBy('created_at','DESC')->get();
        foreach ($reviews as $review) {
            $year = Carbon::parse($review['created_at'])->year;
           
            if (!in_array($year,$years) && $i < 5) {
            
                array_push($years,$year);
                $i++;
            }
        }


        $months = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];

        
        $average_votes=[];
        for ($i=1; $i < 13 ; $i++) { 
           
            $average_vote = DB::table('reviews')
                ->select('vote')
                ->whereMonth('created_at',$i)
                ->whereYear('created_at',$year_selected)
                ->avg('vote');
            array_push($average_votes,$average_vote);    
        }

        array_push($average_votes,0,5);
       
    	return view('admin.profile.statistics.average',compact('years','year_selected'))->with('months',json_encode($months,JSON_NUMERIC_CHECK))->with('average_vote',json_encode($average_votes,JSON_NUMERIC_CHECK));
        
    }

    public function getCountForCurrentYear() {
        $i=0;
        $years=[];
        $reviews = Review::orderBy('created_at','DESC')->get();
        foreach ($reviews as $review) {
            $year = Carbon::parse($review['created_at'])->year;
           
            if (!in_array($year,$years) && $i < 5) {
            
                array_push($years,$year);
                $i++;
            }
        }


        $months = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];

        $year_selected = $years[0];
        $count_votes=[];
        for ($i=1; $i < 13 ; $i++) { 
           
            $count_vote = DB::table('reviews')
                ->select('vote')
                ->whereMonth('created_at',$i)
                ->whereYear('created_at',$year_selected)
                ->count();
            array_push($count_votes,$count_vote);    
        }
        

        array_push($count_votes,0);
       
    	return view('admin.profile.statistics.count',compact('years','year_selected'))->with('months',json_encode($months,JSON_NUMERIC_CHECK))->with('count_vote',json_encode($count_votes,JSON_NUMERIC_CHECK));
        
    }
   
}
