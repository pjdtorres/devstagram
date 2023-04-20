<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd('Aqui se mostra o formulario index');
        return view('perfil.index');
    }    
    
    public function store(Request $request)
    {
        // dd('Aqui se mostra o formulario store');
        // return view('perfil.index');

        // Modificar Request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            // 'username' => 'required|unique:users|min:3|max:20',
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
        ]);

        // if($request->imagem) {
        //     dd('Existe imagem!!!');
        // }else {
        //     dd('Existe imagem');
        // }

        if($request->imagem) {

            $imagem = $request->file('imagem');

            $nomeImagem = Str::uuid() . "." . $imagem->extension();
    
            $imagemServidor = Image::make($imagem);
            $imagemServidor->fit(1000, 1000);
    
            $imagemPath = public_path('perfis') . '/' . $nomeImagem;
            $imagemServidor->save($imagemPath);
        }

        // Guardar
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        // $usuario->imagem = $nomeImagem ?? null;
        $usuario->imagem = $nomeImagem ?? auth()->user()->imagem ?? null;
        $usuario->save();

        // Redirecionar
        return redirect()->route('posts.index', $usuario->username);

    }
}
