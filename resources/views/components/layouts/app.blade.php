<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Basement Notes - {{$title ?? 'Home'}}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-layouts.navbar />
        @if(session('status'))
        <div class="alert alert-primary mt-2" role="alert">
            {{session('status')}}
        </div>
        @endif
        <main class="container my-3 p-3">
            {{ $slot }}
        </main>
        <x-layouts.footer />
    </body>
</html>