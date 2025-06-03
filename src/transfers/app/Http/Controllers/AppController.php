<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function login()
    {
        return view('login'); // Llama a la vista de login 
    }

    public function crearReserva()
    {
        return view('home'); // Llama a la vista de crear reserva
    }
    
    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     // $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }
}
