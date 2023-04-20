<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagemController extends Controller
{
    public function store(Request $request) 
    {
        // return "Desde Imagem Controller";
        // $input = $request->all();

        $imagem = $request->file('file');
        $nomeImagem = Str::uuid() . "." . $imagem->extension();
        $imagemServidor = Image::make($imagem);
        $imagemServidor->fit(1000, 1000);
        $imagemPath = public_path('uploads') . '/' . $nomeImagem;
        $imagemServidor->save($imagemPath);


        // return response()->json(['imagem' => $imagem->extension()]);
        // return response()->json(['imagem' => "Resposta"]);
        return response()->json(['imagem' => $nomeImagem]);
    }
}
