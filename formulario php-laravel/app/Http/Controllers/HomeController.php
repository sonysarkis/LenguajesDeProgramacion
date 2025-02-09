<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show(){
        $usuarios = DB::table('users')->get();
    
        return view('welcome',[
            'usuarios' => $usuarios,
        ]);
    }
}
