<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() 
    {
        return view('auth.login');
    }
    
    public function store(Request $request) 
    {
        // dd('Autenticando ... ');
        // dd($request->remember);

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);



        // if(!auth()->attempt($request->only('email', 'password'), $request->remember ) ) {
        //     return back()->with('msg', 'Credenciais Incorretas');
        // }
        if(!auth()->attempt($request->only('email', 'password'), $request->remember ) ) {
            return back()->with('msg', 'Credenciais Incorretas');
        }

        // return redirect()->route('posts.index', auth()->user()->username );
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
