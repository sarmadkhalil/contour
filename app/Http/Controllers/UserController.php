<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use App\Charts\UserChart;
use DateTime;
use DB;

class UserController extends Controller
{
    public function indexPage(Request $request){
        // $users = User::all();
        if($request->get('sort') == 'name_asc'){
            $users = User::query()
            ->orderBy('name', 'asc')
            ->paginate(10);    
        }
        elseif($request->get('sort') == 'name_desc'){
            $users = User::query()
            ->orderBy('name', 'desc')
            ->paginate(10);    
        }else{
            $users = User::query()
            ->orderBy('name', 'asc')
            ->paginate(10);    
        }

        
        
        return view('users.index', compact('users'));
    }

    public function getDataForCharts(Request $request){
        $dates= array();
        $count= array();
        $userConversion = Log::select(array(
            DB::raw('DATE(`time`) as `date`'),
            DB::raw('COUNT(*) as `count`')
        ))
        ->where('user_id', $request['id'])
        ->where('type', 'conversion')
        ->groupBy('date')
        ->get();



        // dd($count);

        return response()->json($userConversion);
    }
}
