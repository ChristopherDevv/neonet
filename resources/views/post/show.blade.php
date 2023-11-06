@extends('layouts.app')

@section('title') post @endsection

@section('content')
    <div class="flex items-center justify-center md:gap-10 mt-24 xl:mt-5 w-full mx-auto">
        <div class="relative w-full md:w-[900px] overflow-hidden h-full md:h-[550px] bg-[#070A0F] rounded-xl">
            <div class="relative w-full h-full">
                <div class="flex flex-col md:flex-row justify-between h-full w-full text-gray-300">
                    <div class="w-full md:w-1/2 h-full flex items-center justify-center border-r border-r-gray-800">
                        <img class="w-full h-auto" src="{{asset('uploads' . '/' . $post->image)}}" alt="image {{$post->title}}">
                    </div>
                    <div class="w-full md:w-1/2 h-full pt-5  relative">
                        <div class="flex items-center  gap-3 justify-between px-5 {{auth()->check() && $post->user_id === auth()->user()->id ? 'flex-col' : '' }}">
                            <div class="flex items-center gap-1.5">
                                <a href="{{route('post.index', $post->user)}}"  class="h-10 w-10 rounded-full overflow-hidden">
                                    <img class="h-full w-full object-cover" src="{{$post->user->image ? asset('profiles' . '/' . $post->user->image) : asset('img/user-img.svg')}}" alt="Rounded avatar">
                                </a>
                                <div class="text-sm">
                                    <p>{{$post->user->name}}</p>
                                    <a href="{{route('post.index', $post->user)}}"  class="text-xs opacity-70"><span>@</span>{{$post->user->username}}</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-end gap-3">
                                @auth
                                @if ($post->user_id === auth()->user()->id)
                                    <button data-modal-target="delete-post" data-modal-toggle="delete-post" class="transition-all hover:scale-110 duration-500 py-1 px-3 bg-gradient-to-tr from-red-600 to-pink-400 text-[10px] font-semibold text-center rounded-full">
                                        Delete post
                                    </button>
                                    <div id="delete-post" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 min-h-screen bg-opacity-90 backdrop-blur-[5px]">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-post">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Post?</h3>
                                                    <div class="flex items-center justify-center gap-5">
                                                        <form action="{{route('post.destroy', $post)}}" method="POST" class="m-0">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" data-modal-hide="delete-post" type="button" class="transition-all hover:scale-110 duration-500 text-white rounded-lg text-sm px-5 py-2.5 text-center font-semibold bg-gradient-to-tr from-red-600 to-pink-400">
                                                                Yes, I'm sure
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="delete-post" type="button" class="transition-all hover:scale-110 duration-500 text-white rounded-lg text-sm font-semibold px-5 py-2.5 text-center border border-gray-200 bg-transparent">No, cancel</button>    
                                                    </div>
                                                                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                            <div>
                                <button onclick="copyToClipboard('{{ route('post.show', ['user' => $post->user, 'post' => $post]) }}')" data-popover-target="copied-click" type="button" class="items-center justify-center gap-1 text-white inline-flex animate-pulse focus:ring-4 focus:outline-none focus:ring-blue-300 transition-all hover:scale-110 duration-500 py-1 px-3 bg-gradient-to-tr from-blue-600 to-cyan-400 text-[10px] font-semibold text-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-3 md:hidden" viewBox="0 0 24 24"><path d="M14 8H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V10c0-1.103-.897-2-2-2z"></path><path d="M20 2H10a2 2 0 0 0-2 2v2h8a2 2 0 0 1 2 2v8h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg"class="hidden md:block fill-current w-3 h-auto scale-x-[-1]" viewBox="0 0 24 24"><path d="M11 7.05V4a1 1 0 0 0-1-1 1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72 1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11 9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z"></path></svg>
                                    <span>Share post</span>
                                </button>
                                <div data-popover id="copied-click" role="tooltip" class="hidden absolute z-10 invisible text-xs transition-opacity duration-500 rounded-lg opacity-0 text-white bg-gray-800 py-2 px-3 text-center md:inline-flex items-center justify-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4" viewBox="0 0 24 24"><path d="M14 8H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V10c0-1.103-.897-2-2-2z"></path><path d="M20 2H10a2 2 0 0 0-2 2v2h8a2 2 0 0 1 2 2v8h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"></path></svg>
                                    <p>Copy</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <livewire:comment-post :post="$post">

                    </div>
                    
                </div>
                    
            </div>
        </div>
    </div>
    
@endsection

<style>
.p-comments{
padding: 20px 30px;
}
.m-li{
margin-left: 30px;
}
</style>