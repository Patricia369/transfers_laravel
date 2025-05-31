<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('home');
    }
   /* public function login()
    {
        return view('login'); // Llama a la vista de login 
    }*/
    
}

