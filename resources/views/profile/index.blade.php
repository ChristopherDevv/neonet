@extends('layouts.app')

@section('title') Edit Profile {{auth()->user()->name}} @endsection

@section('content')

<div class="mt-[90px] xl:mt-10 w-full mx-auto flex flex-col md:flex-row items-start gap-10">
    <div class="w-full md:w-1/4">
        <div class="flex items-center gap-1.5">
            <a href="{{route('post.index',  auth()->user())}}"  class="h-20 w-20 rounded-full overflow-hidden">
                <img class="w-full h-full object-cover" src="{{auth()->user()->image ? asset( 'profiles' . '/' . auth()->user()->image ) : asset('img/user-img.svg') }}" alt="user image">
            </a>
            <div class="text-sm">
                <p class="font-bold">{{auth()->user()->name}}</p>
                <a href="{{route('post.index', auth()->user())}}"  class="text-xs opacity-70"><span>@</span>{{auth()->user()->username}}</a>
            </div>
        </div>
        <div class="mt-5">
            <button onclick="copyToClipboard('{{ route('post.index', auth()->user()) }}')" data-popover-target="copied-click" type="button" class="items-center justify-center gap-1 py-1 px-5 rounded-full bg-blue-200 text-blue-600 text-xs font-semibold inline-flex animate-pulse focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 md:hidden" viewBox="0 0 24 24"><path d="M14 8H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V10c0-1.103-.897-2-2-2z"></path><path d="M20 2H10a2 2 0 0 0-2 2v2h8a2 2 0 0 1 2 2v8h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg"class="hidden md:block fill-current w-5 h-auto scale-x-[-1]" viewBox="0 0 24 24"><path d="M11 7.05V4a1 1 0 0 0-1-1 1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72 1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11 9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z"></path></svg>
                <span>Share profile</span>
            </button>
            <div data-popover id="copied-click" role="tooltip" class="hidden absolute z-10 invisible text-xs transition-opacity duration-500 rounded-lg opacity-0 text-white bg-gray-800 py-2 px-3 text-center md:inline-flex items-center justify-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5" viewBox="0 0 24 24"><path d="M14 8H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V10c0-1.103-.897-2-2-2z"></path><path d="M20 2H10a2 2 0 0 0-2 2v2h8a2 2 0 0 1 2 2v8h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"></path></svg>
                <p>Copy</p>
            </div>
        </div>
    </div>
    
    <section class="h-full w-full md:w-3/4">
        <form action="{{route('profile.store', auth()->user())}}" method="POST" class="w-full md:max-w-[550px]" enctype="multipart/form-data">
            @csrf
            <div class="w-full flex flex-col md:flex-row items-center justify-between gap-5 md:gap-3">
                <div class="rounded-xl px-3 py-1.5 w-full bg-[#222222] text-white">
                    <label for="image" class="text-xs opacity-50">Profile Image</label>
                    <input id="image" name="image" type="file" accept=".png, .jpeg, .jpg, .svg" value="{{ old('image') }}" class="p-1 bg-transparent text-xs block w-full border-none focus:outline-none" aria-describedby="file_input_help">
                </div>
                <div class="rounded-xl px-3 py-1.5 w-full bg-[#222222] text-white">
                    <label for="coverimg" class="text-xs opacity-50">Cover Image</label>
                    <input id="coverimg" name="coverimg" type="file" accept=".png, .jpeg, .jpg, .svg, .gif" value="{{ old('coverimg') }}" class="p-1 bg-transparent text-xs block w-full border-none focus:outline-none" aria-describedby="file_input_help">
                </div>
            </div>
            <div class="w-full flex flex-col md:flex-row items-center justify-between gap-5 md:gap-3 mt-5">
                <div class="rounded-xl px-3 py-1.5 w-full bg-[#222222] text-white">
                    <label for="name" class="text-xs opacity-50">Name</label>
                    <input id="name" name="name" type="text" value="{{ auth()->user()->name }}" class="p-1 bg-transparent w-full border-none focus:outline-none">
                    @error('name')
                    <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                    @enderror
                </div>
                <div class="rounded-xl px-3 py-1.5 w-full bg-[#222222] text-white">
                    <label for="username" class="text-xs opacity-50">User Name</label>
                    <input id="username" name="username" type="text" value="{{ auth()->user()->username}}" class="p-1 bg-transparent w-full border-none focus:outline-none">
                    @error('username')
                    <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                    @enderror
                </div>
            </div>

            <div class="rounded-xl px-3 py-1.5 w-full bg-[#222222] text-white mt-5">
                <label for="email" class="text-xs opacity-50">Email</label>
                <input id="email" name="email" type="text" value="{{ auth()->user()->email}}" class="p-1 bg-transparent w-full border-none focus:outline-none">
                @error('email')
                <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                @enderror
            </div>
            <div class="rounded-xl px-3 py-1.5 w-full bg-[#222222] text-white mt-5">
                <label for="urlinsta" class="text-xs flex items-center gap-1">
                    <img class="w-5 h-auto" src="https://img.icons8.com/fluency/48/instagram-new.png" alt="instagram-new"/>
                    <span class="opacity-50">Url instagram</span>
                </label>
                <input id="url" name="url" type="text" value="{{ auth()->user()->url }}" class="p-1 bg-transparent w-full border-none focus:outline-none">
                @error('url')
                <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                @enderror
            </div>
            <div class="rounded-xl px-3 py-1.5 w-full mt-5 bg-[#222222] text-white">
                <label for="description" class="text-xs opacity-50">Description</label>
                <textarea name="description" id="description" class="resize-none  p-1 h-20 w-full focus:outline-none border-none bg-transparent" >{{ auth()->user()->description }}</textarea>
                @error('description')
                <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                @enderror
            </div> 
            <div class="text-center mt-6 flex">
                <button type="submit" class="inline-block w-full md:w-auto py-3 px-10 font-bold text-center text-white uppercase align-middle bg-transparent border-0 rounded-full cursor-pointer shadow text-xs bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-[1.02] transition-all duration-300  active:opacity-50">Save changes</button>
            </div>
        </form>
    </section>

</div>

@endsection