@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('conteudo')

<x-listar-post :posts='$posts' />



{{-- <x-listar-post>
    @slot('name')
        <header>Isto é um header!!!</header>
    @endslot
     
    <h1>Mostrando post desde slot</h1>
</x-listar-post> --}}


    {{-- <x-listar-post :posts="$posts" /> --}}

    {{-- @if ($posts->count())
        @foreach ( $posts as $post )
            <h1>{{ $post->titulo }}</h1>
        @endforeach
    @else
        <p>Não existem posts</p>
    @endif

    @forelse ( $posts as $post )
        <h1>{{ $post->titulo }}</h1>
    @empty
        <p>Não existem posts</p>
    @endforelse --}}



@endsection