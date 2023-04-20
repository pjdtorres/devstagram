@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('conteudo')

<div class="flex justify-center">
    <div class="flex flex-col items-center w-full md:w-8/12 lg:w-6/12 md:flex-row">
        <div class="w-8/12 px-5 lg:w-6/12">

            {{-- <img src="{{ asset('img/usuario.svg') }}" alt="imagem utilizador" /> --}}
            {{-- <img src="{{ asset('perfis') . '/' . $user->imagem }}" alt="Imagem do utilizador" /> --}}

            <img src="{{ 
                $user->imagem ?  
                asset('perfis') . '/' . $user->imagem : 
                asset('img/usuario.svg') }}" 
                alt="imagem utilizador" 
            />
        </div>
        
        <div class="flex flex-col items-center px-5 py-10 md:w-8/12 lg:w-6/12 md:justify-center md:items-start md:py-10">
            {{-- {{ dd($user) }} --}}
            {{-- <p class="text-2xl text-gray-700">{{ auth()->user()->username }}</p> --}}

            <div class="flex items-center gap-2">
                <p class="text-2xl text-gray-700">{{ $user->username }}</p>

                @auth
                    @if($user->id === auth()->user()->id)
    
                        <a 
                        {{-- href="{{ route('perfil.index', $user) }}" --}}
                        href="{{ route('perfil.index') }}"
                        class="text-gray-500 cursor-pointer hover:text-gray-600"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                            
                    @endif
    
                @endauth
            </div>

            <p class="mt-5 mb-3 text-sm font-bold text-gray-800">
                {{ $user->followers->count() }}
                
                <span class="font-normal"> @choice('Seguidor|Seguidores', $user->followers->count() ) </span>
                {{-- <span class="font-normal"> Seguidores</span> --}}
            </p>

            <p class="mb-3 text-sm font-bold text-gray-800">
                {{ $user->followings->count() }}
                <span class="font-normal"> Seguindo </span>
            </p>

            <p class="mb-3 text-sm font-bold text-gray-800">
                {{ $user->posts->count() }}
                <span class="font-normal"> Posts</span>
            </p>

            @auth
                @if($user->id !== auth()->user()->id )
                {{-- {{ $user->id }}
                {{ auth()->user()->id }} --}}
                    @if(!$user->seguindo( auth()->user() ))
                        <form
                            action="{{ route('users.follow', $user) }}"
                            method="POST"
                        >
                            @csrf
                            <input
                                type="submit"
                                class="px-3 py-1 text-xs font-bold text-white uppercase bg-blue-600 rounded-lg cursor-pointer"
                                value="Seguir"
                            />
                        </form>
                    
                    @else

                        <form
                            action="{{ route('users.unfollow', $user) }}"
                            method="POST"
                            >
                                @csrf
                                @method('DELETE') 
                                <input
                                    type="submit"
                                    class="px-3 py-1 text-xs font-bold text-white uppercase bg-red-600 rounded-lg cursor-pointer"
                                    value="Parar de Seguir"
                                />
                        </form>
                    @endif                    
                @endif
            @endauth

        </div>
    </div>
</div>

    <section class="container mx-auto mt-10">
        <h2 class="my-10 text-4xl font-black text-center">Publicações</h2>

        {{-- <x-listar-post :posts="$posts" /> --}}
        {{-- {{ dd($posts) }} --}}
        {{-- {{ dd($user->posts) }} --}}
        
            {{-- <div>
                <img src="{{ asset('uploads') . '/' . $post->imagem }}" alt="Imagem de post {{ $post->titulo }}">

                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user ]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->imagem }}" alt="Imagem de post {{ $post->titulo }}">
                </a>

            </div> --}}

            <x-listar-post :posts="$posts" />

    </section>

@endsection