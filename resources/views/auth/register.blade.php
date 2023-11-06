<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>NeoNet - register</title>
        <link rel="shortcut icon" href="{{asset('img/logo2.svg')}}" type="image/x-icon">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="bg-gray-50 text-slate-600">
       @component('layouts.components.auth')
             @section('titleauth') Welcome! @endsection
             @section('titleform') Sing Up @endsection
             @section('formsection')
                <form action="{{route('register.store')}}" method="POST" novalidate>
                    @csrf
                    <div class="rounded-xl px-3 py-1.5 w-full bg-[#090D14] text-white">
                        <label for="name" class="text-xs opacity-50">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="p-1 border-none bg-transparent border-transparent w-full focus:outline-none">
                        @error('name')
                        <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                        @enderror
                    </div>
                    <div class="rounded-xl px-3 py-1.5 w-full bg-[#090D14] text-white mt-5">
                        <label for="username" class="text-xs opacity-50">User name</label>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" class="p-1 border-none bg-transparent border-transparent w-full focus:outline-none">
                        @error('username')
                        <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                        @enderror
                    </div>
                    <div class="rounded-xl px-3 py-1.5 w-full bg-[#090D14] text-white mt-5">
                        <label for="email" class="text-xs opacity-50">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="user@gmail.com" value="{{ old('email') }}" class="p-1 border-none bg-transparent border-transparent w-full focus:outline-none">
                        @error('email')
                        <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                        @enderror
                    </div>
                    <div class="rounded-xl px-3 py-1.5 w-full bg-[#090D14] text-white mt-5">
                        <label for="password" class="text-xs opacity-50">Password</label>
                        <input id="password" name="password" placeholder="••••••••" type="password" class="p-1 border-none bg-transparent border-transparent w-full focus:outline-none">
                        @error('password')
                        <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                        @enderror
                    </div>
                    <div class="rounded-xl px-3 py-1.5 w-full bg-[#090D14] text-white mt-5">
                        <label for="password_confirmation" class="text-xs opacity-50">Confirmation</label>
                        <input id="password_confirmation" name="password_confirmation" placeholder="••••••••" type="password" class="p-1 border-none bg-transparent border-transparent w-full focus:outline-none">
                    </div>

                    <div class="text-center mt-9">
                        <button type="submit" class="inline-block w-full px-6 py-3 font-bold text-center text-white uppercase align-middle bg-transparent border-0 rounded-full cursor-pointer shadow text-xs bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-[1.02] transition-all duration-300  active:opacity-50">Sign Up</button>
                    </div>
                    <div class="text-center mt-5">
                    <p class="mx-auto mb-6 leading-normal text-sm">
                        Already have an account? 
                        <a href="{{route('login')}}" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Sign in</a>
                    </p>
                    </div>
                </form>
             @endsection
       @endcomponent
       @component('layouts.components.footer')@endcomponent

    </body>
</html>

