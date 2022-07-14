@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="md:1/2 bg-white shadow p-6">
        <form method="POST" action="{{route('perfil.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
        @csrf
                
            <div class="mb-5">
                <label class="mb-2 block uppercase text-gray-500 dont-bold" for="username">Username</label>
                <input 
                        id="username" 
                        name="username"
                        type="text"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg
                        @error('username') 
                        border-red-500 
                        @enderror"
                        value="{{auth()->user()->username}}"
                >
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="mb-2 block uppercase text-gray-500 dont-bold" for="imagen">Imagen Perfil</label>
                <input 
                        id="imagen" 
                        name="imagen"
                        type="file"
                        class="border p-3 w-full rounded-lg"
                        value=""
                        accept=".jpg, .jpeg, .png"
                >
            </div>
                
            <div class="my-3">
                <label class="mb-2 block text-gray-500 dont-bold" for="email">Ingrese contraseña</label>
                <input 
                        id="password" 
                        name="password"
                        type="password"
                        placeholder=""
                        class="border p-3 w-full rounded-lg"
                >
            </div>
            <div class="flex gap-2 mb-5">
                <a 
                href="{{route('perfil.edit.email',auth()->user()->username)}}"
                class=" bg-white hover:bg-red-500 hover:text-white border border-red-300 transition-colors cursor-pointer font-bold w-full p-1 text-red-500 rounded-lg text-center"
                >Cambiar Email
                </a>
                <a 
                href="{{route('perfil.edit.password',auth()->user()->username)}}"
                class=" bg-white hover:bg-red-500 hover:text-white border border-red-300 transition-colors cursor-pointer font-bold w-full p-1 text-red-500 rounded-lg text-center"
                >Cambiar Contraseña
                </a>
            </div>
            
            <input 
            type="submit" 
            value="Guardar cambios" 
            class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
        </div>
    </div>
@endsection