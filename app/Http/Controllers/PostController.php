<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth')->except('show','index');
    }

    public function index(User $user) 
    {
        // dd(auth()->user());
        // dd($user->username);
        // dd($user->id);

        // $posts = Post::where('user_id', $user->id)->get();
        $posts = Post::where('user_id', $user->id)->latest()->paginate(2);
        // $posts = Post::where('user_id', $user->id)->simplePaginate(2);

        // dd($posts);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create() 
    {
        // dd('Criando ...');
        return view('posts.create');
    }

    public function store(Request $request) 
    {
        // dd('Criando publicação ... ');
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'imagem' => 'required'
        ]);

        // Uma forma
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descricao' => $request->descricao,
        //     'imagem' => $request->imagem,
        //     'user_id' => auth()->user()->id
        // ]);

        // Outra forma
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descricao = $request->descricao;
        // $post->imagem = $request->imagem;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // Outra, outra forma
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $request->imagem,
            'user_id' => auth()->user()->id
        ]);


        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {
        // dd('Eliminando', $post->id);
        // if($post->user_id === auth()->user()->id){
        //     dd('Mesma pessoa!');
        // }
        // else
        // {
        //     dd('Não é a mesma pessoa');
        // };

        $this->authorize('delete', $post);
        $post->delete();

        // Eliminar a imagem
        $imagem_path = public_path('uploads/' . $post->imagem);

        if(File::exists($imagem_path)) {
            unlink($imagem_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }

}

// session_start();
// $_SESSION['email'] = $resultado['email'];