<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>NeoNet - login</title>
        <link rel="shortcut icon" href="{{asset('img/logo2.svg')}}" type="image/x-icon">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="bg-gray-50 text-slate-600"> 
        
       @component('layouts.components.auth')
       @section('titleauth') Welcome back! @endsection
       @section('titleform') Sing In @endsection
       @section('formsection')
          <form action="{{route('login.store')}}" method="POST" novalidate>
              @csrf
              @if (session('massageInvalided'))
                    <div class="flex items-center justify-center gap-3 w-full mx-auto p-4 my-4 text-gray-500 bg-white rounded-lg shadow-md">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/></svg>
                        </div>
                        <div class="text-sm text-red-500 font-medium">{{session('massageInvalided')}} </div>
                    </div> 
                @endif

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

              <label class="relative inline-flex items-center cursor-pointer mt-5">
                <input type="checkbox" name="remember" class="sr-only peer" checked>
                <div class="w-9 h-5 bg-gray-200 rounded-full peer  dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-500"></div>
                <span class="ml-2 text-sm font-medium text-gray-400">Remember me</span>
              </label>

              <div class="text-center mt-5">
                <button type="submit" class="inline-block w-full px-6 py-3 font-bold text-center text-white uppercase align-middle bg-transparent border-0 rounded-full cursor-pointer shadow text-xs bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-[1.02] transition-all duration-300  active:opacity-50">Sign In</button>
            </div>
            <div class="text-center mt-5">
            <p class="mx-auto mb-6 leading-normal text-sm">
                Don't have an account? 
                <a href="{{route('register')}}" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Sign Up</a>
            </p>
            </div>

          </form>
       @endsection
 @endcomponent
 @component('layouts.components.footer')@endcomponent
    </body>
</html>
