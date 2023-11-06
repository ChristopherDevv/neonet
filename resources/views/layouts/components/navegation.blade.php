<i class="ml-4 hidden"></i>
<div class="max-w-[15.625rem] overflow-hidden hidden xl:flex xl:flex-col p-5 items-center justify-center ml-4 z-10 fixed inset-y-0 my-4  w-full rounded-2xl border-0 antialiased transition-transform duration-300 xl:left-0 bg-gradient-to-br from-slate-900 to-slate-800">
    <h2 class="text-white text-lg font-bold text-center mb-3">Hello, Welcome!</h2>
    <div class="w-full h-72 bg-black rounded-md flex flex-col">
        <div class="flex items-center gap-1 p-3">
            <span class="h-2 w-2 rounded-full bg-orange-500"></span>
            <span class="h-2 w-2 rounded-full bg-yellow-500"></span>
            <span class="h-2 w-2 rounded-full bg-green-300"></span>
        </div>
        <div class="w-full h-full overflow-hidden px-1.5 pb-1.5">
            <img class="w-full h-full object-cover" src="{{asset('img/post-2.jpg')}}" alt="imagen nav">
        </div>
    </div>
    <p class="text-[10px] uppercase tracking-[1px] font-semibold mt-3">neonet</p>
    <img class="w-full h-auto rounded" src="https://readme-typing-svg.demolab.com?font=Roboto&weight=500&size=11&duration=3000&pause=1000&color=F7F7F7&center=true&vCenter=true&random=false&width=150&height=15&lines=Give+likes;Meet+friends;Share+post" alt="image words">
</div>

<div id="nav" class="max-w-[15.625rem] ml-0 z-[60] xl:z-[50] fixed inset-y-0 my-4 xl:ml-4 block w-full -translate-x-full xl:translate-x-0 flex-wrap items-center justify-between overflow-hidden rounded-2xl border-0 bg-[#070A0F] xl:bg-black bg-opacity-80 xl:bg-opacity-70 backdrop-filter backdrop-blur-md p-0 antialiased transition-transform duration-300 xl:left-0 shadow-xl">
   <div class="relative h-screen">
    <div class="h-20">
        <a href="{{route('welcome')}}" class="flex px-8 py-6 m-0 text-sm whitespace-nowrap items-center justify-center gap-1">
            <img class="w-10 h-auto" src="{{asset('img/logo2.svg')}}" alt="logo"/>
            <span class="ml-1 font-bold text-gray-400 tracking-[1.5px] uppercase text-[9px]">NeoNet</span>
        </a>
    </div>
    <hr class="h-[3px] mx-[9px] bg-transparent bg-gradient-to-r from-transparent via-white to-transparent opacity-10">
    <nav class="text-gray-400 mt-2">
        <ul class="flex flex-col pl-0 mb-0">

            <li class="mt-3 w-full ">
                <a class="py-1 text-sm my-0 mx-4 flex items-center whitespace-nowrap hover:opacity-60 transition-all duration-500 px-4  {{request()->routeIs('welcome') ? 'bg-white shadow-lg py-2 rounded-lg bg-opacity-10 text-white' : ''}}" href="{{route('welcome')}}">
                    <div class="{{request()->routeIs('welcome') ? 'bg-gradient-to-tl from-cyan-400 to-blue-700' : ''}} shadow-lg mr-2 flex items-center justify-center rounded-lg bg-white bg-center text-center p-2">
                        <svg class="{{request()->routeIs('welcome') ? 'text-white' : ''}} w-4 h-auto fill-current" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 11C0 4.92525 4.92525 0 11 0C17.0747 0 22 4.92525 22 11C22 17.0747 17.0747 22 11 22C4.92525 22 0 17.0747 0 11ZM11.7218 19.9713C11.4837 19.9903 11.243 20 11 20C10.757 20 10.5163 19.9903 10.2782 19.9713C9.51921 19.2472 8.89448 17.4093 8.56135 15H13.4387C13.1055 17.4093 12.4808 19.2472 11.7218 19.9713ZM13.6375 13H8.36248C8.32156 12.3558 8.3 11.6866 8.3 11C8.3 10.3134 8.32156 9.64423 8.36248 9H13.6375C13.6784 9.64423 13.7 10.3134 13.7 11C13.7 11.6866 13.6784 12.3558 13.6375 13ZM15.2764 15C15.0641 16.7413 14.698 18.2548 14.1674 19.4247C16.3017 18.6196 18.0522 17.0256 19.0613 15H15.2764ZM19.776 13H15.4484C15.4829 12.3534 15.5 11.6852 15.5 11C15.5 10.3148 15.4829 9.64658 15.4484 9H19.776C19.9226 9.64342 20 10.3128 20 11C20 11.6872 19.9226 12.3566 19.776 13ZM6.55159 13C6.51705 12.3534 6.5 11.6852 6.5 11C6.5 10.3148 6.51705 9.64658 6.55159 9H2.22397C2.07741 9.64342 2 10.3128 2 11C2 11.6872 2.07741 12.3566 2.22397 13H6.55159ZM2.93868 15C3.94784 17.0256 5.69834 18.6196 7.83263 19.4247C7.30199 18.2548 6.9359 16.7413 6.72358 15H2.93868ZM10.2782 2.02866C9.51921 2.75278 8.89448 4.59072 8.56135 7H13.4387C13.1055 4.59072 12.4808 2.75278 11.7218 2.02866C11.4837 2.00968 11.243 2 11 2C10.757 2 10.5163 2.00968 10.2782 2.02866ZM15.2764 7H19.0613C18.0522 4.97444 16.3017 3.38036 14.1674 2.57531C14.698 3.74519 15.0641 5.25873 15.2764 7ZM2.93868 7H6.72358C6.9359 5.25873 7.30199 3.74519 7.83263 2.57531C5.69834 3.38036 3.94784 4.97444 2.93868 7Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <span class="ml-1 {{request()->routeIs('welcome') ? 'font-semibold' : ''}}">Explore</span>
                </a>
            </li>
            <li class="mt-3 w-full">
                <a class="py-1 text-sm my-0 mx-4 flex items-center whitespace-nowrap hover:opacity-60 transition-all duration-500 px-4  {{request()->routeIs('user.search') ? 'bg-white shadow-lg py-2 rounded-lg bg-opacity-10 text-white' : ''}}" href="{{route('user.search')}}">
                    <div class="{{request()->routeIs('user.search') ? 'bg-gradient-to-tl from-cyan-400 to-blue-700' : ''}} shadow-lg mr-2 flex items-center justify-center rounded-lg bg-white bg-center text-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="{{request()->routeIs('user.search') ? 'text-white' : ''}} w-4 h-auto fill-current" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path></svg>
                    </div>
                    <span class="ml-1 {{request()->routeIs('user.search') ? 'font-semibold' : ''}}">Search</span>
                </a>
            </li>
            <li class="mt-3 w-full">
                <a class="py-1 text-sm my-0 mx-4 flex items-center px-4 hover:opacity-60 transition-all duration-500 {{auth()->check() && request()->route('user') && request()->route()->uri == "{user}/following" ? 'bg-white shadow-lg py-2 rounded-lg bg-opacity-10 text-white' : ''}}" href="{{auth()->check() ? route('users.following', auth()->user()) : route('login')}}">
                    <div class="{{auth()->check() && request()->route('user') && request()->route()->uri == "{user}/following" ? 'bg-gradient-to-tl from-cyan-400 to-blue-700' : ''}} shadow-lg mr-2 flex items-center justify-center rounded-lg bg-white bg-center text-center h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="{{auth()->check() && request()->route('user') && request()->route()->uri == "{user}/following" ? 'text-white' : ''}} w-5 h-auto fill-current" viewBox="0 0 24 24"><path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm9.364-10.364L16.95 4.05C18.271 5.373 19 7.131 19 9s-.729 3.627-2.05 4.95l1.414 1.414C20.064 13.663 21 11.403 21 9s-.936-4.663-2.636-6.364z"></path><path d="M15.535 5.464 14.121 6.88C14.688 7.445 15 8.198 15 9s-.312 1.555-.879 2.12l1.414 1.416C16.479 11.592 17 10.337 17 9s-.521-2.592-1.465-3.536z"></path></svg>
                    </div>
                    <span class="ml-1 {{auth()->check() && request()->route('user') && request()->route()->uri == "{user}/following" ? 'font-semibold' : ''}}">Following</span>
                </a>
            </li>
            <li class="mt-3 w-full">
                <a class="py-1 text-sm my-0 mx-4 flex items-center whitespace-nowrap hover:opacity-60 transition-all duration-500 px-4  {{request()->routeIs('neonet.about') ? 'bg-white shadow-lg py-2 rounded-lg bg-opacity-10 text-white' : ''}}" href="{{route('neonet.about')}}">
                    <div class="{{request()->routeIs('neonet.about') ? 'bg-gradient-to-tl from-cyan-400 to-blue-700' : ''}} shadow-lg mr-2 flex items-center justify-center rounded-lg bg-white bg-center text-center h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="{{request()->routeIs('neonet.about') ? 'text-white' : ''}} w-[19px] h-auto fill-current" viewBox="0 0 24 24"><path d="M3 11v8h.051c.245 1.692 1.69 3 3.449 3 1.174 0 2.074-.417 2.672-1.174a3.99 3.99 0 0 0 5.668-.014c.601.762 1.504 1.188 2.66 1.188 1.93 0 3.5-1.57 3.5-3.5V11c0-4.962-4.037-9-9-9s-9 4.038-9 9zm6 1c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zm6-4c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z"></path></svg>
                    </div>
                    <span class="ml-1 {{request()->routeIs('neonet.about') ? 'font-semibold' : ''}}">About</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Account pages</h6>
            </li>
            @auth
                <li class="mt-3 w-full ">
                    <a class="py-1 text-sm my-0 mx-4 flex items-center whitespace-nowrap hover:opacity-60 transition-all duration-500 px-4  {{request()->route('user') && request()->route()->uri == "{user}/profile" && request()->route('user')->username == auth()->user()->username ? 'bg-white shadow-lg py-2 rounded-lg bg-opacity-10 text-white' : ''}}" href="{{ auth()->check() ? route('post.index', auth()->user()) : route('login') }}">
                        <div class="{{request()->route('user') && request()->route()->uri == "{user}/profile" && request()->route('user')->username == auth()->user()->username ? 'bg-gradient-to-tl from-cyan-400 to-blue-700' : ''}} shadow-lg mr-2 flex items-center justify-center rounded-lg bg-white bg-center text-center h-8 w-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="{{request()->route('user') && request()->route()->uri == "{user}/profile" && request()->route('user')->username == auth()->user()->username ? 'text-white' : ''}} w-[18px] h-auto fill-current" viewBox="0 0 24 24"><path d="M19 2H5a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h4l3 3 3-3h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-7 3c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zM7.177 16c.558-1.723 2.496-3 4.823-3s4.266 1.277 4.823 3H7.177z"></path></svg>                    
                        </div>
                        <span class="ml-1 {{request()->route('user') && request()->route()->uri == "{user}/profile" && request()->route('user')->username == auth()->user()->username ? 'font-semibold' : ''}}">Profile</span>
                    </a>
                </li>
            @endauth

            @auth
            <li class="mt-3 w-full ">
                <button data-modal-target="logout-sesion" data-modal-toggle="logout-sesion" class="py-1 text-sm my-0 mx-4 w-full flex items-center whitespace-nowrap hover:opacity-60 transition-all duration-500 px-4">
                    <div class="bg-gradient-to-tl from-pink-300 to-pink-700 shadow-lg mr-2 flex items-center justify-center rounded-lg bg-white bg-center text-center h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-[18px] h-auto fill-current" viewBox="0 0 24 24"><path d="M18.5 2h-13a.5.5 0 0 0-.5.5V11h6V8l5 4-5 4v-3H5v8.5a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-19a.5.5 0 0 0-.5-.5z"></path></svg>
                    </div>
                    <span class="ml-1 font-semibold">Logout</span>
                </abutton>
            </li>
            @endauth
            @guest
            <li class="mt-3 w-full">
                <a class="py-1 text-sm my-0 mx-4 flex items-center whitespace-nowrap hover:opacity-60 transition-all duration-500 px-4" href="{{route('login')}}">
                    <div class="shadow-lg mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-current" viewBox="0 0 24 24" ><path d="M5.962 17.674C7 19.331 7 20.567 7 22h2c0-1.521 0-3.244-1.343-5.389l-1.695 1.063zM16.504 3.387C13.977 1.91 7.55.926 4.281 4.305c-3.368 3.481-2.249 9.072.001 11.392.118.122.244.229.369.333.072.061.146.116.205.184l1.494-1.33a3.918 3.918 0 0 0-.419-.391c-.072-.06-.146-.119-.214-.188-1.66-1.711-2.506-6.017.001-8.608 2.525-2.611 8.068-1.579 9.777-.581 2.691 1.569 4.097 4.308 4.109 4.333l1.789-.895c-.065-.135-1.668-3.289-4.889-5.167z"></path><path d="M9.34 12.822c-1.03-1.26-1.787-2.317-1.392-3.506.263-.785.813-1.325 1.637-1.604 1.224-.41 2.92-.16 4.04.601l1.123-1.654c-1.648-1.12-3.982-1.457-5.804-.841-1.408.476-2.435 1.495-2.892 2.866-.776 2.328.799 4.254 1.74 5.405.149.183.29.354.409.512C11 18.323 11 20.109 11 22h2c0-2.036 0-4.345-3.201-8.601a19.71 19.71 0 0 0-.459-.577zm5.791-3.344c1.835 1.764 3.034 4.447 3.889 8.701l1.961-.395c-.939-4.678-2.316-7.685-4.463-9.748l-1.387 1.442z"></path><path d="m11.556 9.169-1.115 1.66c.027.019 2.711 1.88 3.801 5.724l1.924-.545c-1.299-4.582-4.476-6.749-4.61-6.839zm3.132 9.29c.21 1.168.312 2.326.312 3.541h2c0-1.335-.112-2.608-.343-3.895l-1.969.354z"></path></svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Sign In</span>
                </a>
            </li>
            <li class="mt-3 w-full">
                <a class="py-1 text-sm my-0 mx-4 flex items-center whitespace-nowrap hover:opacity-60 transition-all duration-500 px-4" href="{{ route('register') }}">
                    <div class="shadow-lg mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-cente">
                        <svg class="fill-current w-4" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>spaceship</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero"><g transform="translate(1716.000000, 291.000000)"><g transform="translate(4.000000, 301.000000)"><path class="fill-gray-400" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path><path class="fill-gray-400 opacity-60" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path><path class="fill-gray-400 opacity-60" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"></path><path class="fill-gray-400 opacity-60" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"></path></g></g></g></g></svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Sign Up</span>
                </a>
            </li>
            @endguest
        </ul>
    </nav>

</div>
</div>
@auth
<div id="logout-sesion" tabindex="-1" class="fixed top-0 left-0 right-0 z-[70] hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 min-h-screen bg-opacity-90 backdrop-blur-[5px]">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="logout-sesion">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to log out?</h3>
                <div class="flex items-center justify-center gap-5">
                    <form action="{{route('logout')}}" method="POST" class="m-0 p-0">
                        @csrf
                        <button data-modal-hide="logout-sesion" type="submit" class="transition-all hover:scale-110 duration-500 text-white rounded-lg text-sm px-5 py-2.5 text-center font-semibold bg-gradient-to-tr from-red-600 to-pink-400">
                            Yes, I'm sure   
                        </abutton>
                    </form>
                    <button data-modal-hide="logout-sesion" type="button" class="transition-all hover:scale-110 duration-500 text-white rounded-lg text-sm font-semibold px-5 py-2.5 text-center border border-gray-200 bg-transparent">No, cancel</button>    
                </div>
                                                                
            </div>
        </div>
    </div>
</div>
@endauth