<div class="fixed top-0 left-0 right-0 z-50 xl:static xl:top-auto xl:left-auto xl:right-auto xl:z-auto">
    <div class="flex items-center justify-between  py-3 xl:py-0 px-4 xl:px-1 bg-[#070A0F] xl:bg-opacity-100 bg-opacity-90 backdrop-filter backdrop-blur-sm  xl:bg-transparent xl:shadow-none">
        <p class="text-gray-400 hidden xl:block font-semibold uppercase text-xs tracking-[1.5px]">Pages / <span>@yield('title')</span></p>
        <a href="{{route('welcome')}}" class="flex whitespace-nowrap items-center py-1 gap-1 xl:hidden">
            <img class="w-8 h-auto" src="{{asset('img/logo2.svg')}}" alt="logo"/>
            <span class="ml-1 font-bold text-gray-400 tracking-[1.5px] uppercase text-[9px]">NeoNet</span>
        </a>
        <div class="flex items-center gap-4">
            <div class="">
                @auth
                    <a href="{{route('post.index', auth()->user())}}" class="text-xs text-gray-400 xl:text-gray-300 xl:bg-[#070A0F] rounded-full xl:py-2 xl:px-5">Profile</a>
                @endauth
                @guest
                    <a href="{{route('login')}}" class="text-xs text-gray-400 xl:text-gray-300 xl:bg-[#070A0F] rounded-full xl:py-2 xl:px-5">Profile</a>
                @endguest
            </div>
            <div>
                <a href="{{route('user.search')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 text-gray-400 fill-current" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path></svg>
                </a>
            </div>
            
            <button id="toogle-button" class="xl:hidden flex items-center" style="direction: rtl;">
                <div class="w-6">
                    <i class="w-2/3 hidden"></i>
                    <i id="line1" class="w-full mb-1 relative block  h-[3px] rounded-sm bg-gray-400 transition-all duration-300"></i>
                    <i class="w-full  mb-1 relative block  h-[3px] rounded-sm bg-gray-400 transition-all duration-300"></i>
                    <i id="line2" class="w-full relative block  h-[3px] rounded-sm bg-gray-400 transition-all duration-300"></i>
                </div>
            </button>
            <button id="toogle-xl" class="hidden xl:flex items-center" style="direction: rtl;">
                <div class="w-6">
                    <i class="w-2/3 hidden"></i>
                    <i id="line3" class="w-full mb-1 relative block h-[3px] rounded-sm bg-gray-400 transition-all duration-300"></i>
                    <i class="w-full  mb-1 relative block h-[3px] rounded-sm bg-gray-400 transition-all duration-300"></i>
                    <i id="line4" class="w-full relative block h-[3px] rounded-sm bg-gray-400 transition-all duration-300"></i>
                </div>
            </button>
        </div>
    </div>
</div>

