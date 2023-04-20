<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {

        // Modificar Request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validation
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:2'
        ]);

                // dd($request);
        // dd($request->get('username'));
        // dd("criando conta");

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // Outra forma de autenticar
        auth()->attempt($request->only('email', 'password'));


        // Redirecionar
        return redirect()->route('posts.index', auth()->user() );

    }

    
}
