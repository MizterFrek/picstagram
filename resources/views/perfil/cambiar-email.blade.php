@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="md:1/2 bg-white shadow p-6">
        <form method="POST" action="#" class="mt-10 md:mt-0">
        @csrf
                
            <div class="mb-5">
                <label class="mb-2 block uppercase text-gray-500 dont-bold" for="old_email">Email actual</label>
                <input 
                        id="old_email" 
                        name="old_email"
                        type="email"
                        placeholder="Tu email actual"
                        class="border p-3 w-full rounded-lg
                        @error('email') 
                        border-red-500 
                        @enderror"
                >
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            
            <div class="mb-5">
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
                >
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="mb-2 block uppercase text-gray-500 dont-bold" for="email_confirmation">Confirmar Email</label>
                <input 
                        id="email_confirmation" 
                        name="email_confirmation"
                        type="email"
                        placeholder="Confirmar Email"
                        class="border p-3 w-full rounded-lg
                        @error('email') 
                        border-red-500 
                        @enderror"
                >
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            
            <input 
            type="submit" 
            value="Cambiar Email" 
            class=" bg-white hover:bg-red-500 hover:text-white border border-red-300 transition-colors cursor-pointer font-bold w-full p-3 text-red-500 rounded-lg text-center">
        </form>
        </div>
    </div>
@endsection