<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Log;
use App\Charts\UserChart;
use DateTime;
use DB;

class Users extends Component
{
    public $userID;
    public function render()
    {
        $dates= array();
        $count= array();
        $users = User::query()
        ->orderBy('name', 'asc')
        ->paginate(10);

        $userConversion = Log::select(array(
            DB::raw('DATE(`time`) as `date`'),
            DB::raw('COUNT(*) as `count`')
        ))
        ->where('type', 'conversion')
        ->groupBy('date')
        ->get()
        ->toArray();
        
        // echo '<pre>';
        // print_r($userConversion);
        // exit;


        foreach($userConversion as $user){
            array_push($dates, $user['date']);
            array_push($count, $user['count']);
        }

        // dd($count);

        $chart = new UserChart; 
        $chart->labels($dates);
        $chart->dataset('conversion', 'line', $count);

        // dd($userConversion);
        return view('livewire.users.users', compact('users', 'chart'))
            ->extends('layouts.master  ')
            ->section('content');
    }

}
