<div class="flex items-center gap-2 z-30">
    @auth
        <button wire:click="like" class="transition-all duration-500 hover:scale-150 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-auto {{$isLiked ? 'text-red-600 md:hover:text-white' : 'text-white md:hover:text-red-600'}} transition-all duration-500 fill-current" viewBox="0 0 24 24"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
        </button>
    @else
        <a href="{{route('login')}}" class="transition-all duration-500 hover:scale-150 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-auto  text-white hover:text-red-600 transition-all duration-500 fill-current" viewBox="0 0 24 24"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
        </a>
    @endauth
   
    <div class="relative">
        <div class="hello user-likes group-hover:opacity-100 opacity-0 hidden transition-all duration-500 absolute top-0 left-0 z-20  w-52 text-sm rounded-lg text-gray-400 bg-gray-800">
            <div class="p-3 flex flex-col gap-1 max-h-popover">
                @foreach ($post->likedBy as $user)
                    <div class="w-full px-3 py-1 bg-blue-400 bg-opacity-10 rounded-lg">
                        <div  class="w-full flex items-center gap-2">
                            <a href="{{route('post.index', $user)}}">
                                <div class="h-9 w-9 rounded-full overflow-hidden">
                                    <img class="h-full w-full object-cover" src="{{$user->image ? asset('profiles' . '/' . $user->image) : asset('img/user-img.svg')}}" alt="Rounded avatar">
                                </div>
                            </a>
                            <div class="w-full text-xs text-gray-300">
                                <p>{{$user->name}}</p>
                                <a href="{{route('post.index', $user)}}" class="text-[10px] opacity-80">@<span>{{$user->username}}</span></a>        
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <p class="text-center text-xs show-all cursor-pointer transition-all duration-300 hover:text-cyan-600">{{$likes}} Likes</p>
    </div>

    
</div>
