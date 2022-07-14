@extends('layouts.app')

@section('titulo')
    Perfil:{{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5 ">
                <img class="rounded-full"
                {{-- Condicion para cargar la foto. En caso no tener una, muestra la svg x defecto  
                    //condicion ?-> Si se cumple esta condicion 
                    //Ejecuta este codigo
                    // : -> Casto contrario lo que sigue despues de estos 2 puntos
                    --}}
                src="{{ 
                $user->imagen ? 
                asset('perfiles').'/'.$user->imagen : 
                asset('img/usuario.svg') 
                }}" 
                alt="Imagen Usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <div class="flex items-center gap-2">                
                    <p class="text-gray-700 text-2xl">
                        {{$user->username}}
                    </p>
                    @auth
                        @if ($user->id===auth()->user()->id)
                            <a 
                                href="{{route('perfil.index')}}"
                                class="text-gray-400 hover:text-gray-800 cursor-pointer"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{$user->followers->count()}}
                    <span class="font-normal">
                        @choice ('seguidor|seguidores',$user->followers->count())
                    </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->followings->count()}}
                    <span class="font-normal">
                        Siguiendo
                    </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->posts->count()}}
                    <span class="font-normal">
                        Posts
                    </span>
                </p>
                @auth
                @if ($user->id!== auth()->user()->id)
                    @if (!$user->siguiendo(auth()->user()))
                        <form 
                            method="POST"
                            action="{{route('users.follow',$user)}}"
                        >@csrf
                        <input 
                            type="submit"
                            class="bg-blue-600 text-white rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                            value="Follow"
                            >

                        </form>
                    @else
                        <form 
                            method="POST"
                            action="{{route('users.unfollow',$user)}}"
                        >
                        @method('DELETE')
                        @csrf
                        <input 
                            type="submit"
                            class="bg-red-600 text-white rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                            value="UnFollow"
                            >

                        </form>
                    @endif
                @endif    
                @endauth
            </div>

        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10"></h2>
        
        <x-listar-post :posts="$posts"/>
    </section>
@endsection
