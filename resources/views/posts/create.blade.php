@extends('layouts.app')

@section('titulo')
    Criando uma nova Publicação
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('conteudo')
    <div class="md:flex md:justify-center md:gap-10 md:items-center ">
        <div class="px-10 md:w-1/2">
            <form action="{{ route('imagem.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" 
                class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded dropzone h-96">
                @csrf
            </form>
        </div>

        <div class="p-10 mt-10 bg-white rounded-lg shadow-xl md:w-1/2 md:mt-0">
            <form action="{{ route('posts.store') }}"  method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="block mb-2 font-bold text-gray-500 uppercase">
                           Titulo
                    </label>
                    <input 
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Titulo da Publicação"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('titulo') }}"
                    />

                    @error('titulo')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }} </p>
                    @enderror
                </div>

                
                <div class="mb-5">
                    <label for="descricao" class="block mb-2 font-bold text-gray-500 uppercase">
                        Descricao
                    </label>
                    <textarea 
                        id="descricao"
                        name="descricao"
                        placeholder="Descrição da Publicação"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    >{{ old('descricao') }}</textarea>

                    @error('descricao')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input 
                        name="imagem"
                        type="hidden"
                        value="{{ old('imagem') }}"
                    />
                    @error('imagem')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }} </p>
                    @enderror
                </div>

                <input
                type="submit"
                value="Publicar"
                class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
            />

            </form>

            
        </div>


    </div>



@endsection
