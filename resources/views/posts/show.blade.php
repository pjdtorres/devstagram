@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection


@section('conteudo')

    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagem }}" alt="Imagem do post {{ $post->titulo }}">

            <div class="flex items-center gap-4 p-3">

                @auth

                    {{-- @php
                        $msg = "Ola show pt";
                    @endphp --}}
                
                    <livewire:like-post :post="$post"/>

                @endauth

                {{-- <p class="font-bold">
                    {{ $post->likes->count() }} 
                    <span class="font-normal">likes</span>  
                </p> --}}
            </div>

            <div>
                <p class="font-bold"> {{ $post->user->username }} </p>
                <p class="text-sm text-gray-500">
                    {{-- {{ $post->created_at->diffForHumans() }} --}}
                    {{ $post->created_at }}
                </p>
                <p class="mt-5">
                    {{ $post->descricao }}
                </p>
            </div>

            @auth
                @if($post->user_id === auth()->user()->id )
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input 
                            type="submit"
                            value="Eliminar Publicação"
                            class="p-2 mt-4 font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-600"
                        />
                    </form>
                @endif
            @endauth
{{-- 
            <form>

                <input 
                    type="submit"
                    value="Eliminar Publicação"
                    class="p-2 mt-4 font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-600"
                />
            </form> --}}
            
        </div>

        <div class="p-5 md:w-1/2">

            <div class="p-5 mb-5 bg-white shadow">

                @auth
                    
                    <p class="mb-4 text-xl font-bold text-center">Junta um Novo Comentario</p>

                    @if(session('msg'))
                        <div class="p-2 mb-6 font-bold text-center text-white uppercase bg-green-500 rounded-lg">
                            {{session('msg')}}
                        </div>
                    @endif


                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user ] ) }}" method="POST">

                            @csrf
                        <div class="mb-5">
                            <label for="comentario" class="block mb-2 font-bold text-gray-500 uppercase">
                                Junta um Comentario
                            </label>
                            <textarea 
                                id="comentario"
                                name="comentario"
                                placeholder="Junta um Comentario"
                                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                            ></textarea>
        
                            @error('comentario')
                                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }} </p>
                            @enderror
                        </div>

                        <input
                            type="submit"
                            value="Comentar"
                            class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                        />
                    </form>

                @endauth

                <div class="mt-10 mb-5 overflow-y-scroll bg-white shadow max-h-96">
                    {{-- {{ dd(comentarios) }} --}}
                    @if ($post->comentarios->count())
                        @foreach ( $post->comentarios as $comentario )
                            <div class="p-5 border-b border-gray-300">
                                <a href="{{ route('posts.index', $comentario->user ) }} " class="font-bold">
                                {{-- <a href="#"> --}}
                                        {{$comentario->user->username}}
                                </a>
                                <p> {{ $comentario->comentario }} </p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">Não existem Comentarios!</p>
                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection