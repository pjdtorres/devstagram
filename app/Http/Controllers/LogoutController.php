<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store() 
    {
        // dd('Encerrando sessão ... ');
        auth()->logout();
        
        return redirect()->route('login');
;    }
}
