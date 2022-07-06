<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <div class="mt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('status'))
                    <div x-data="{ alert : true }" x-show="alert"
                         class="flex justify-between mb-4 p-3 animate-pulse bg-emerald-300 mb-4">
                        <div>
                            {{ session('status') }}
                        </div>
                        <div class="flex items-center ml-2">
                            <a href="#" @click="alert = false">
                                <svg fill="none" class="w-5 h-5 w-4 h-4" viewBox="0 0 48 48"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="white" fill-opacity="0.01" height="48" width="48">
                                    </rect>
                                    <path d="M8 8L40 40" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                    <path d="M8 40L40 8" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div x-data="{ alert : true }" x-show="alert"
                             class="flex justify-between p-3 animate-pulse bg-red-300 mb-4">
                            <div>
                                {{ $error }}
                            </div>
                            <div class="flex items-center ml-2">
                                <a href="#" @click="alert = false">
                                    <svg fill="none" class="w-5 h-5 w-4 h-4" viewBox="0 0 48 48"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect fill="white" fill-opacity="0.01" height="48" width="48">
                                        </rect>
                                        <path d="M8 8L40 40" stroke="currentColor" stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                        <path d="M8 40L40 8" stroke="currentColor" stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        {{ $slot }}
    </main>
</div>
</body>
</html>
