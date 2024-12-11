<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //

    public function index(){
    
        $user = auth()->user();
        $cardExist = $user->card()->exists();

    return view('dashboard.dashboard', compact('cardExist'));
       
    }


    

    
}
