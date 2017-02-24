<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('back');
    }
    public function error()
    {
        
        return view('errors.503');
    }
    
}
