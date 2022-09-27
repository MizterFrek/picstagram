@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection


@section('contenido')
    <div class="sm:flex sm:justify-center">
        <div class="sm:w-2/3 md:w-1/3 bg-white shadow p-6">
        <form 
        method="POST" 
        action="{{route('perfil.update.email')}}" 
        class="mt-10 md:mt-0"
        >
        @csrf                
            <div class="mb-5">
                @if(session('mensaje-contraseña'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{session('mensaje-contraseña')}}
                    </p>
                @endif
                <label class="mb-2 block uppercase text-gray-500 dont-bold" for="email">Nuevo Email</label>
                <input 
                        id="email" 
                        name="email"
                        type="email"
                        placeholder="Nuevo Email"
                        class="border p-3 w-full rounded-lg
                        @error('email') 
                        border-red-500 
                        @enderror"
                        value="{{old('email')}}"
                >
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                
                <label class="mb-2 block uppercase text-gray-500 dont-bold" for="old_email">Password de confirmación</label>
                <input 
                        id="password" 
                        name="password"
                        type="password"
                        placeholder="Password"
                        class="border p-3 w-full rounded-lg
                        @error('password') 
                        border-red-500 
                        @enderror"
                >
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <input 
            type="submit" 
            value="Cambiar Email" 
            class=" bg-white hover:bg-red-500 hover:text-white border border-red-300 transition-colors cursor-pointer font-bold w-full p-2 text-red-500 rounded-lg text-center mb-2">

            <a href="{{route('perfil.index',auth()->user()->username)}}"
            class=" block text-center w-full bg-white hover:bg-red-500 hover:text-white border border-red-300 transition-colors cursor-pointer font-bold  p-2 px-auto  text-red-500 rounded-lg">
            Volver Atrás</a>
        </form>
        </div>
    </div>
@endsection