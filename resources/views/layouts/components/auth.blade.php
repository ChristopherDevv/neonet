<section class="h-[400px] rounded-2xl mt-5 mx-4 md:mx-10 bg-[#070A0F] bgsection py-7 px-6 md:px-10 text-gray-300">
    <div class="flex items-center justify-between z-20 relative">
        <a href="{{route('welcome')}}"><img class="w-10 h-auto" src="{{asset('img/logo2.svg')}}" alt="logo web"></a>
        <div class=" items-center gap-7 text-sm ml-12 hidden md:flex">
           <a href="{{route('register')}}" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 24 24"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>
            <p>Sing Up</p>
           </a>
           <a href="{{route('login')}}" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 24 24"><path d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z"></path></svg>                    
            <p>Sing In</p>
           </a>
        </div>
        <a href="{{route('welcome')}}" class="py-1.5 px-5 rounded-md bg-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-current" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
            <p class="text-sm font-bold">Back</p>
        </a>
    </div>
    <div class="mt-10 z-20 relative">
        <h2 class="text-3xl font-extrabold text-center mb-5"><span class="text-transparent bg-clip-text bg-gradient-to-r to-purple-700 from-cyan-400">@yield('titleauth')</span></h2>
        <div class="text-center w-full">Sign in or create a new 
            <a href="{{route('register')}}" class="underline underline-offset-4 decoration-[3px] decoration-cyan-600"> account for free.</a>
        </div>
    </div>
</section>

<div class="px-6 md:px-0">
    <section class="relative min-h-[170px] p-5 z-20 mx-auto w-full md:max-w-[400px] overflow-hidden border-0 rounded-xl bg-gray-50 bg-opacity-30  backdrop-filter backdrop-blur-[33px] -mt-32 lg:-mt-40">
        <h3 class="text-white text-center text-lg font-semibold">@yield('titleform')</h3>
        <div class="mt-6">
            @yield('formsection')
        </div>
    </section>
</div>

<style>
    @media (min-width: 768px) {
       .bgsection{
           position: relative;
       }

       .bgsection::before{
           content: "";
           position: absolute;
           top: 0;
           right: 0;
           height: 100%;
           background: linear-gradient(233deg,#0c111a 5%,hsla(0,0%,100%,.001) 95%);
           -webkit-clip-path: polygon(35% 0,100% 0,100% 100%,0 100%);
           clip-path: polygon(35% 0,100% 0,100% 100%,0 100%);
           width: 60%;
           z-index: 10;
           border-radius: 16px;
       }
   }

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
</style>