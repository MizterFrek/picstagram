<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @stack('styles')
        <title>{{ config('app.name') }} | @yield('titulo')</title>
        @vite('resources/css/app.css')
        @livewireStyles()
    </head>
    <body class="bg-gray-100">
       <header class="p-5 border-b bg-white shadow">
        <div class="md:hidden mb-5">
            <a href="{{route('home')}}">
                <img src="{{asset('img/logo.png')}}" class="h-10" style="filter: brightness(1.1); mix-blend-mode: multiply;">
            </a>
        </div>
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{route('home')}}" class="hidden md:block">
                <img src="{{asset('img/logo.png')}}" class="h-10" style="filter: brightness(1.1); mix-blend-mode: multiply;">
            </a>
            @auth
                <nav class="flex gap-10 items-center justify-between w-full md:w-auto">
                    <a 
                    href="{{route('posts.create')}}"
                    class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                        crear
                    </a>
                    <a class="font-bold text-gray-600 text-sm" href="{{route('posts.index',auth()->user()->username)}}">Hola:  
                        <span class="font-normal">
                            {{auth()->user()->username}}
                        </span>
                    </a>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                    <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesión
                    </button>
                    </form>
                </nav>
            @endauth
            @guest
                <nav class="flex gap-4 items-center">
                    @if(request()->routeIs('login'))
                        <a class="w-36 text-sm font-bold text-center bg-white hover:bg-sky-600 hover:text-white transition-colors cursor-pointer border border-sky-600 uppercase px-3 py-2 text-sky-600 rounded-md" href="{{route('register')}}">
                            Crear cuenta
                        </a>    
                    @else
                        <a class="w-36 text-sm font-bold text-center bg-white hover:bg-sky-600 hover:text-white transition-colors cursor-pointer border border-sky-600 uppercase px-3 py-2 text-sky-600 rounded-md" href="{{route('login')}}">
                            Login
                        </a>
                    @endif
                </nav>
            @endguest
        </div>
       </header>
       <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
                @yield('contenido')
       </main>
       <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
        MizterFrek | {{ config('app.name') }} - Todos los derechos reservados
        {{now()->year}}
       </footer>
       @stack('scripts')
       @livewireScripts()
    </body>
</html>
