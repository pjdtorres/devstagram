@extends('layouts.app')

@section('titulo')
    Iniciar Sessão em Devstagram
@endsection

@section('conteudo')
    <div class="md:flex md:justify-center md:gap-10 md:items-center ">
        <div class="p-20 md:w-6/12">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagem login de utilizadores" >
        </div>

        <div class="items-center p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if(session('msg'))
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{ session('msg') }} 
                    </p>
                @endif

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
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }} </p>
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
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> 
                    <label class="text-sm text-gray-500">Manter a minha sessão aberta</label>
                </div>


                <input
                    type="submit"
                    value="Iniciar Sessão"
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                />

            </form>
    </div>
@endsection

