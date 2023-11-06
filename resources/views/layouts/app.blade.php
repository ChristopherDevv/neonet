<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>NeoNet - @yield('title')</title>
        <link rel="shortcut icon" href="{{asset('img/logo2.svg')}}" type="image/x-icon">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles
    </head>
    <body id="body" class="bg-gray-50 text-slate-600 relative {{request()->route() && (request()->route()->uri == "{user}/following" || request()->route()->uri == "{user}/post/{post}" || request()->route()->uri == "search") ? 'bg-gray-900' : ''}}">
        @component('layouts.components.navegation')@endcomponent
       
        <main class="xl:ml-[17.125rem] relative min-h-screen transition-all duration-200 xl:px-6 xl:py-6 overflow-hidden">
            @component('layouts.components.navBar')@endcomponent
            <section>@yield('header')</section>
            <section class="px-4 xl:px-0">@yield('content')</section>

        </main>

        <footer class="xl:ml-[17.125rem] transition-all duration-200 xl:px-6 overflow-hidden">
          @component('layouts.components.footer')@endcomponent
        </footer>

        @livewireScripts
        <script src="{{ asset('js/navegation.js') }}"></script>
        <script src="{{asset('js/modal.js')}}"></script>
        <script src="{{asset('js/copiedprofile.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
      </body>
</html>

<style>

    /* Ancho del scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

/* Track del scrollbar */
::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
}

/* Handle del scrollbar */
::-webkit-scrollbar-thumb {
  background: #b1b1b1;
  border-radius: 5px;
}

/* Handle del scrollbar al hacer hover */
::-webkit-scrollbar-thumb:hover {
  background: #757575;
}

.burbuja {
    width: 10px;
    height: 10px;n no me permite rotarlos, me ayudas: 
    transform: rotate(120deg);
    position: absolute;
    top: 20%;
    animation: mover 4s ease-in-out infinite;
}

.burbuja.izquierda {
    background-color: #782ED0;
    left: 0;
}

.burbuja.derecha {
    background-color: #25CEED;
    right: 0;
}

@keyframes mover {
  0%, 100% { transform: translateY(0) rotate(110deg); }
    50% { transform: translateY(-10px) rotate(160deg); }
}

.p-comments{
    padding: 20px 30px;
    }
    .m-li{
    margin-left: 30px;
    }

    .container {
  width: 100%;
  position: relative;
}
.item {
  position: absolute;
  text-align: center;
  padding: 5px;
}
.inset-popover {
    inset: auto auto -10px 0px !important;
  
}
.max-h-popover{
    max-height: 250px !important;
    overflow-y: auto !important;
}

.p-comments{
    padding: 20px 30px;
}
.m-li{
    margin-left: 30px;
}

.user-likes{
  inset: auto auto 30px -45px; 
  margin: 0px;
}
@media (min-width: 1120px) { 
  .user-likes {
    inset: auto auto 30px -80px; 
  }
}
</style>
