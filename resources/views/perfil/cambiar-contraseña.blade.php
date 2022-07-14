@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:1/2 bg-white shadow p-6 mt-10 md:mt-0">
        <form 
        method="POST" 
        action="{{route('perfil.update.password')}}" 
        class="mt-10 md:mt-0"
        >
        @csrf
            <div class="mb-5">
                <label class="required mb-2 block uppercase text-gray-500 dont-bold" for="old_password">Password actual</label>
                <input 
                        id="old_password" 
                        name="old_password"
                        type="password"
                        placeholder="Password actual"
                        class="border p-3 w-full rounded-lg"
                >
            </div>
            
            <div class="mb-5">
                <label class="mb-2 block uppercase text-gray-500 dont-bold" for="password">Nuevo Password</label>
                <input 
                        id="password" 
                        name="password"
                        type="password"
                        placeholder="Nuevo Password"
                        class="border p-3 w-full rounded-lg
                        @error('password') 
                        border-red-500 
                        @enderror"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>

            <div class="mb-5">
                <label class="required mb-2 block uppercase text-gray-500 dont-bold" for="password_confirmation">Confirmar Password</label>
                <input 
                    id="password_confirmation" 
                    name="password_confirmation"
                    type="password"
                    placeholder="Repite tu Password"
                    class="border p-3 w-full rounded-lg"
                >
            </div>

            <input 
            type="submit" 
            value="Cambiar Contraseña" 
            class=" bg-white hover:bg-red-500 hover:text-white border border-red-300 transition-colors cursor-pointer font-bold w-full p-3 text-red-500 rounded-lg text-center"
            >
        </form>
        </div>
    </div>
@endsection