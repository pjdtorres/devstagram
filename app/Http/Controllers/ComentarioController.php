<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        // dd('Comentando');

        // dd($post->id);
        // dd($user->username);


        // Validar
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);


        // Armazenar o resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        // Imprimir uma mensagem
        return back()->with('msg', 'Comentario realizado corretamente!');
    }
}
