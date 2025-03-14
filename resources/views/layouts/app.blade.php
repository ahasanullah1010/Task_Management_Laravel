<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom CSS -->
    <style>
        .task-card {
            border-left: 5px solid #007bff;
            transition: transform 0.2s;
        }
        .task-card:hover {
            transform: scale(1.02);
        }
        .priority-high { border-left-color: red !important; }
        .priority-medium { border-left-color: orange !important; }
        .priority-low { border-left-color: green !important; }

        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        .dark-mode .card {
            background-color: #1e1e1e;
            color: white;
            border-color: gray;
        }
        .dark-mode .btn {
            border-color: white;
        }
        .toggle-dark-mode {
            cursor: pointer;
            background: none;
            border: none;
            color: inherit;
            font-size: 20px;
        }
    </style>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
                {{-- @yield("content") --}}
            </main>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  


        {{-- night mode --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const darkModeToggle = document.getElementById("darkModeToggle");
                const body = document.body;
        
                if (localStorage.getItem("dark-mode") === "enabled") {
                    body.classList.add("dark-mode");
                }
        
                darkModeToggle.addEventListener("click", function () {
                    body.classList.toggle("dark-mode");
                    if (body.classList.contains("dark-mode")) {
                        localStorage.setItem("dark-mode", "enabled");
                    } else {
                        localStorage.setItem("dark-mode", "disabled");
                    }
                });
            });
        </script>



        
    </body>
</html>
