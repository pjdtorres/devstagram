@extends('layouts.app')

@section('titulo')
    Regista em Devstagram
@endsection

@section('conteudo')
    <div class="md:flex md:justify-center md:gap-10 md:items-center ">
        <div class="p-20 md:w-6/12">
            <img src="{{ asset('img/registar.jpg') }}" alt="Imagem registo de utilizadores" >
        </div>

        <div class="items-center p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form action="{{ route('register') }}"  method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label id="name" class="block mb-2 font-bold text-gray-500 uppercase">
                        Nome
                    </label>
                    <input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Indique o seu Nome"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                    />

                    
                    @error('name')     
                    
                        @php

                            $message = str_replace(array('name', '"'), array('NOME', ''), $message);
                            // $message = str_replace('name', 'nome', $message);
                            // $message = str_replace('"', '', $message);
                        @endphp
                        
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>

                    @enderror
                    
                </div>

                <div class="mb-5">
                    <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">
                        Username
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Indique o seu Nome de Utilizador"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                    />

                    @error('username')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ str_replace('"', '', $message) }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Seu Email de Registo"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ str_replace('"', '', $message) }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block mb-2 font-bold text-gray-500 uppercase">
                        Password
                    </label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password de Registo"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    />
                    @error('password')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ str_replace('"', '', $message) }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="block mb-2 font-bold text-gray-500 uppercase">
                        Repetir Password
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repetir Password"
                        class="w-full p-3 border rounded-lg"
                    />
                </div>

                <input
                    type="submit"
                    value="Crir Conta"
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                />

            </form>
    </div>
@endsection

