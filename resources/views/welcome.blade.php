@extends('layouts.app')

@section('title') Explore @endsection



@section('header')
<div class="block relative h-full w-full md:min-h-[500px] xl:min-h-[400px] xl:h-[400px] overflow-hidden bg-cover bg-top xl:rounded-xl xl:mt-5">
    <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-[#070A0F] bgsection"></span>
    <div class="absolute top-0 left-0 w-full h-full bg-center bg-cover opacity-60 md:opacity-40 scale-[180%] md:scale-100 z-20 flex items-center justify-center">
        <img class="scale-150 -mt-32 md:-mt-10 md:scale-100 md:w-[1200px] md:h-[300px] " src="{{asset('img/header-bg.webp')}}" alt="header bg">
    </div>
    <div class="relative flex w-full h-full items-center justify-center z-20">
        <div class="max-w-[500px] mb-16 flex flex-col items-center justify-center">
            <div class="relative w-full max-w-[180px]">
                <h1 class="mb-5 text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-purple-700 from-cyan-400">NeoNet</span></h1>
                <div class="burbuja izquierda"></div>
                <div class="burbuja derecha"></div>
            </div>
            <p class="text-sm text-gray-300 text-center mx-4 mb-7 md:mb-5">Share your personality in unique and minimalist photographs, meet new friends, new ideas and
                <span class="underline underline-offset-2 decoration-[3px] decoration-cyan-500"> discover yourself.</span>
            </p>
            <img class="w-[70%] md:w-[50%] h-auto" src="https://readme-typing-svg.demolab.com?font=Roboto&weight=500&size=11&duration=3000&pause=1000&color=F7F7F7&center=true&vCenter=true&random=false&width=150&height=15&lines=Give+likes;Meet+friends;Share+post" alt="image words">
        </div>
    </div>
</div>

<div class="relative min-w-0 px-4 lg:px-8 min-h-[170px] flex items-center justify-center z-20 py-7 mx-3 md:mx-6 overflow-hidden border-0 rounded-xl bg-gray-50 bg-opacity-30  backdrop-filter backdrop-blur-[33px] -mt-28 lg:-mt-20">
    <div class="grid grid-cols-4 items-center w-full gap-3 md:hidden">
       @foreach ($usersMobile as $user )
       <div class="flex flex-col items-center justify-center gap-2">
            <div class="w-[60px] h-[60px] rounded-full overflow-hidden">
                <a href="{{route('post.index', $user)}}">
                    <img class="w-full h-full object-cover" src="{{$user->image ? asset('profiles' . '/' . $user->image) : asset('img/user-img.svg')}}" alt="image {{$user->username}}">
                </a>  
            </div>
        
            <a href="{{route('post.index', $user)}}">
                <div class="max-w-[60px]">
                    <p class="text-xs font-bold overflow-hidden overflow-ellipsis whitespace-nowrap">@<span>{{$user->username}}</span> </p>
                </div>
            </a>  
       </div>
       @endforeach
    </div>
    <div class="hidden md:grid md:grid-cols-8 lg:grid-cols-11 items-center w-full gap-3">
       @foreach ($usersMd as $user )
       <div class="flex flex-col items-center justify-center gap-2">
            <div class="w-16 h-16 rounded-full overflow-hidden transition-all duration-500 hover:translate-y-[-4px]">
                <a href="{{route('post.index', $user)}}">
                    <img class="w-full h-full object-cover" src="{{$user->image ? asset('profiles' . '/' . $user->image) : asset('img/user-img.svg')}}" alt="image {{$user->username}}">
                </a>    
            </div>
            
            <a href="{{route('post.index', $user)}}">
                <div class="max-w-[60px]">
                    <p class="text-xs font-bold overflow-hidden overflow-ellipsis whitespace-nowrap">@<span>{{$user->username}}</span> </p>
                </div>
            </a>  
       </div>
       @endforeach
    </div>
</div>

@endsection

@section('content')

<main class="mt-10">
   <div class="grid grid-cols-1 md:grid-cols-3 gap-7 md:gap-10 items-end">
        @if ($posts->count())
        @foreach ($posts as $post)
        <div class="w-full h-auto min-h-[100px]">
            <livewire:post-modal :post="$post">
            <div class="px-3 flex items-center justify-between gap-2 mt-5 cursor-default">
                <div class="flex items-center gap-3">
                    <a href="{{route('post.index', $post->user)}}" class="cursor-pointer">
                        <div class="h-10 w-10 md:h-10 md:w-10 overflow-hidden rounded-full flex items-center justify-center relative">
                            <img class="w-full h-full object-cover" src="{{$post->user->image ? asset( 'profiles' . '/' . $post->user->image ) : asset('img/user-img.svg') }}" alt="user image">
                        </div>
                    </a>
                    
                    <div>
                        <p class="font-bold text-xs">{{$post->user->name}}</p>
                        <a href="{{route('post.index', $post->user)}}">
                            <p class="opacity-70 text-xs">@<span>{{$post->user->username}}</span></p>
                        </a>
                    </div>
                </div>
                <p class="text-xs text-gray-400 ml-1">{{$post->created_at->diffForHumans()}}</p> 
            </div>
            <h2 class="text-sm font-bold mt-3 px-3">{{$post->title ? $post->title : '☆*.°• hello •°.*☆'}}</h2>
            <div class="mt-3 bg-transparent bg-gradient-to-r from-transparent via-black/[0.11] to-transparent px-7 py-2 inline-flex items-center justify-center ">
                <livewire:like-post :post="$post"/>
            </div>
            <p class="text-xs opacity-80 mt-3">{{$post->description}}</p>
        </div>
        @endforeach

        @endif
       
   </div>
   <div class="mt-20">
        {{$posts->links('pagination::tailwind')}}
    </div>
</main>

@endsection

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
        background: linear-gradient(233deg,#0c111a 5%,hsla(0,0%,100%,.01) 95%);
        -webkit-clip-path: polygon(35% 0,100% 0,100% 100%,0 100%);
        clip-path: polygon(35% 0,100% 0,100% 100%,0 100%);
        width: 60%;
        z-index: 10;
    }
    }
 
    .p-comments{
    padding: 20px 30px;
    }
    .m-li{
    margin-left: 30px;
    }
</style>