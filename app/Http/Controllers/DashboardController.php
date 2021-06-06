<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

   public function userCount()
    {
           $users = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
             
            $months = User::select(DB::raw("Month(created_at)as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');
             $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
             foreach($months as $index=>$month)
             {
                 $datas[$month]= $users[$index]; 
             } 
             return view('dashboard',compact('datas'));             
    }

    

    public function BlogCount()
    {
        $blogs = Blog::select(DB::raw("Count(*) as count"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');
        $months = Blog::select(DB::raw("Month(created_at)as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');
        $blogdata = array(0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index=>$month)
        {
            $blogdata[$month]= $blogs[$index];
        }
        return view('dashboard',compact('blogdata'));
    }


   


}
