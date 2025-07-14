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
    <div class="flex h-screen ">
        <div class="w-[240px] bg-slate-900 border-r fixed h-screen hidden lg:flex">
            <div class="py-5">
                <div class="  font-bold px-4">
                    <a href="#" class="text-lg text-white">Ivote</a>
                </div>

                <ul class="relative w-[240px] mt-12">
                    <li class="{{ Route::currentRouteName() === 'dashboard' ? 'bg-slate-800 text-white font-medium ' : 'text-slate-500' }} py-3 px-4 flex">
                        <x-heroicon-o-home class="w-5 h-5 self-center mr-2" /> 
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'parties' ? 'bg-slate-800 text-white font-medium ' : 'text-slate-500' }} py-3 px-4 flex">
                        <x-heroicon-o-user class="w-5 h-5 self-center mr-2" /> 
                        <a href="{{ route('parties') }}">Parties</a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'election' ? 'bg-slate-800 text-white font-medium ' : 'text-slate-500' }} py-3 px-4 flex">
                        <x-heroicon-o-user class="w-5 h-5 self-center mr-2" /> 
                        <a href="{{ route('election') }}">Election</a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'candidates' ? 'bg-slate-800 text-white font-medium ' : 'text-slate-500' }} py-3 px-4 flex">
                        <x-heroicon-o-user class="w-5 h-5 self-center mr-2" /> 
                        <a href="{{ route('candidates') }}">Candidate</a>
                    </li>
                   
                    <li class="py-3 px-4 text-red-500 flex">
                        <a href="/">Logout</a>
                        {{-- <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="button">Logout</button>
                        </form> --}}
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="overflow-y-auto w-full lg:ml-[240px] ">
            <div class="bg-white border-b py-5 px-4">
                <h1>Welcome</h1>
            </div>

            <div class="container mx-auto  px-4 mt-4">

                {{ $slot }}
            </div>
            @livewire('notifications')
        </div>
    </div>

    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
