<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />

    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-neutral-100">
    <header>
        <nav class="bg-white py-4" x-data="{ open = true }">
            <div class="container mx-auto">
                <div class="flex justify-between px-4">
                    <a href="/" class="font-bold text-xl text-green-500 ">ivote</a>
                    <div class="hidden md:block self-center">
                        <ul class="flex gap-6">
                           
                            @auth
                                <form action="{{ route('logout') }}" class="self-center " method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500">Logout</button>
                                </form>
                            @endauth

                            @if(Auth::check())

                            @else      
                            <a href="{{ route('login') }}"
                            class="border-2 px-6 py-2 rounded-md text-green-500 font-semibold border-green-500 hover:bg-green-500 hover:text-white cursor-pointer">
                            {{-- <x-heroicon-o-bars-3 class="h-6 w-6" /> --}}
                           Login
                        </a>
                            @endif
                        </ul>
                    </div>
                    <div class="block md:hidden">

                        <button
                            class="border-2 px-4 py-1 rounded-md text-green-500 font-semibold border-green-500 hover:bg-green-500 hover:text-white cursor-pointer">
                            {{-- <x-heroicon-o-bars-3 class="h-6 w-6" /> --}}
                            Vote
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    {{ $slot }}

    @livewire('notifications')

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
