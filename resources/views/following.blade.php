@extends('layouts.app')

@section('title') Following @endsection

@section('header')
<div class="w-full xl:pr-[265px] mb-10 mt-5">
    <div class="w-full h-auto pt-32 pb-16 xl:pt-10 xl:pb-10 bg-[#070A0F] rounded-xl">
        <div class="relative w-full max-w-[200px] mx-auto">
            <h1 class="text-3xl md:text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-purple-700 from-cyan-400">Following</span></h1>
            <div class="burbuja izquierda"></div>
            <div class="burbuja derecha"></div>
        </div>
        <p class="text-sm text-gray-300 text-center mx-4 mb-7 md:mb-5 z-20 relative mt-5">Meet new friends and
            <a href="{{route('welcome')}}" class="underline underline-offset-4 decoration-[2px] decoration-blue-400 dark:decoration-blue-600"> discover yourself.</a>
        </p>
    </div>
</div>

@endsection

@section('content')
<div class="mt-16 xl:mt-5 w-full mx-auto">

    <section class="hidden xl:block fixed right-5 top-16 w-full md:max-w-[230px] min-h-[100px]">
        <div class="flex items-center justify-center flex-col w-full h-full p-5 bg-[#070A0F] rounded-2xl bgprofile">
            <a href="{{route('post.index', auth()->user())}}" class="cursor-pointer">
                <div class="h-12 w-12 overflow-hidden rounded-full flex items-center justify-center relative z-20">
                    <img class="w-full h-full object-cover" src="{{auth()->user()->image ? asset( 'profiles' . '/' . auth()->user()->image ) : asset('img/user-img.svg') }}" alt="user image">
                </div>
            </a>
            <p class="font-bold text-xs text-gray-200 relative z-20">{{auth()->user()->name}}</p>
            <a href="{{route('post.index', auth()->user())}}" class="cursor-pointer">
                <p class="text-xs opacity-70 text-gray-200 relative z-20">@<span>{{auth()->user()->username}}</span></p>
            </a>
        </div>
        <div class="rounded-2xl p-3 max-h-[300px] bg-[#2A364D] mt-2 overflow-y-auto overflow-hidden">
            <div class="text-gray-200 flex flex-col gap-2 w-full h-full">
                @if (auth()->user()->followings->count())
                    @foreach (auth()->user()->followings as $following)
                        <div class="w-full flex items-center justify-between">
                            <div class="w-2/3 flex items-center gap-1.5">
                                <a href="{{route('post.index', $following)}}">
                                    <div class="h-10 w-10 rounded-full overflow-hidden">
                                        <img class="h-full w-full object-cover" src="{{$following->image ? asset('profiles' . '/' . $following->image) : asset('img/user-img.svg')}}" alt="Rounded avatar">
                                    </div>
                                </a>
                            <div class="text-xs">
                                <p><span>{{$following->name}}</p>
                                <a href="{{route('post.index', $following)}}" class="text-[8.5px] opacity-70"><span>@</span>{{$following->username}}</a>
                            </div>
                            </div>
                            <div class="w-1/3">
                                <a href="{{route('post.index', $following)}}" class="p-1 font-normal rounded-full text-center block bg-gradient-to-tr from-blue-700 to-cyan-400 w-full text-xs text-white">View</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center justify-center w-full flex-col gap-1">
                        <svg class="w-4 h-auto fill-current" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 11C0 4.92525 4.92525 0 11 0C17.0747 0 22 4.92525 22 11C22 17.0747 17.0747 22 11 22C4.92525 22 0 17.0747 0 11ZM11.7218 19.9713C11.4837 19.9903 11.243 20 11 20C10.757 20 10.5163 19.9903 10.2782 19.9713C9.51921 19.2472 8.89448 17.4093 8.56135 15H13.4387C13.1055 17.4093 12.4808 19.2472 11.7218 19.9713ZM13.6375 13H8.36248C8.32156 12.3558 8.3 11.6866 8.3 11C8.3 10.3134 8.32156 9.64423 8.36248 9H13.6375C13.6784 9.64423 13.7 10.3134 13.7 11C13.7 11.6866 13.6784 12.3558 13.6375 13ZM15.2764 15C15.0641 16.7413 14.698 18.2548 14.1674 19.4247C16.3017 18.6196 18.0522 17.0256 19.0613 15H15.2764ZM19.776 13H15.4484C15.4829 12.3534 15.5 11.6852 15.5 11C15.5 10.3148 15.4829 9.64658 15.4484 9H19.776C19.9226 9.64342 20 10.3128 20 11C20 11.6872 19.9226 12.3566 19.776 13ZM6.55159 13C6.51705 12.3534 6.5 11.6852 6.5 11C6.5 10.3148 6.51705 9.64658 6.55159 9H2.22397C2.07741 9.64342 2 10.3128 2 11C2 11.6872 2.07741 12.3566 2.22397 13H6.55159ZM2.93868 15C3.94784 17.0256 5.69834 18.6196 7.83263 19.4247C7.30199 18.2548 6.9359 16.7413 6.72358 15H2.93868ZM10.2782 2.02866C9.51921 2.75278 8.89448 4.59072 8.56135 7H13.4387C13.1055 4.59072 12.4808 2.75278 11.7218 2.02866C11.4837 2.00968 11.243 2 11 2C10.757 2 10.5163 2.00968 10.2782 2.02866ZM15.2764 7H19.0613C18.0522 4.97444 16.3017 3.38036 14.1674 2.57531C14.698 3.74519 15.0641 5.25873 15.2764 7ZM2.93868 7H6.72358C6.9359 5.25873 7.30199 3.74519 7.83263 2.57531C5.69834 3.38036 3.94784 4.97444 2.93868 7Z" fill="currentColor"></path>
                        </svg>
                        <a href="{{route('welcome')}}" class="text-sm font-semibold hover:text-cyan-400 transition-all duration-300">Explore</a>
                    </div>
                @endif
               
            </div>
        </div>
    </section>
    
    <main class="w-full xl:pr-[265px]">
        @if ($posts->count())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7 md:gap-10 items-end text-gray-300">
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
                                    <p class="opacity-70 text-xs">@<span>{{$post->user->name}}</span></p>
                                </a>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 ml-1">{{$post->created_at->diffForHumans()}}</p> 
                    </div>
                    <h2 class="text-sm font-bold mt-3 px-3">{{$post->title ? $post->title : '☆*.°• hello •°.*☆'}}</h2>
                    <div class="mt-3 bg-transparent bg-gradient-to-r from-transparent via-white/10 to-transparent px-7 py-2 inline-flex items-center justify-center ">
                        <livewire:like-post :post="$post"/>
                    </div>
                    <p class="text-xs opacity-80 mt-3">{{$post->description}}</p>
                </div>
                @endforeach                
        </div>
        @else
        <div class="mx-auto w-full flex items-center justify-center">
            <div class="w-64 h-80 bg-[#070A0F] rounded-md flex flex-col">
                <div class="flex items-center gap-1 p-3">
                    <span class="h-2 w-2 rounded-full bg-orange-500"></span>
                    <span class="h-2 w-2 rounded-full bg-yellow-500"></span>
                    <span class="h-2 w-2 rounded-full bg-green-300"></span>
                </div>
                <div class="w-full h-full overflow-hidden px-1.5 pb-1.5">
                    <div class="w-full h-full bg-white flex items-center justify-center">
                        <p class="text-center">Nothing to watch</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="mt-20">
            {{$posts->links('pagination::tailwind')}}
        </div>
    </main>
   

</div>

@endsection

<style>
    .bgprofile{
           position: relative;
       }

       .bgprofile::before{
           content: "";
           position: absolute;
           top: 0;
           right: 0;
           height: 100%;
           background: linear-gradient(233deg,#262c44 5%,hsla(0,0%,100%,.001) 95%);
           -webkit-clip-path: polygon(35% 0,100% 0,100% 100%,0 100%);
           clip-path: polygon(35% 0,100% 0,100% 100%,0 100%);
           width: 60%;
           z-index: 10;
           border-radius: 16px;
       }
</style>