<div class="w-full h-full flex flex-col mt-5">
    <div class="h-[250px] overflow-y-auto p-comments w-full rounded-md bg-[#04070a]">
        @if($post->comments->count())
            <ol class="relative border-l border-gray-500 ">
                @foreach ($post->comments->reverse() as $comment)                       
                    <li class="mb-10 m-li">
                        <a href="{{route('post.index', $comment->user)}}" class="absolute flex items-center justify-center rounded-full w-6 h-6 bg-black overflow-hidden -left-3 ring-8 ring-gray-500 ">
                            <img class="shadow-lg w-full h-full object-cover" src="{{$comment->user->image ? asset('profiles' . '/' . $comment->user->image) : asset('img/user-img.svg')}}" alt=""/>
                        </a>
                        <div class="p-4 rounded-lg shadow-sm bg-gray-900">
                            <div class="items-center justify-between mb-3 flex">
                                <div class="text-xs font-normal text-gray-200">
                                    <a href="{{route('post.index', $comment->user)}}">@<span>{{$comment->user->username}}</span></a>
                                </div>
                                <time class="mb-1 text-[10px] md:text-xs font-normal sm:order-last sm:mb-0">{{$comment->created_at->diffForHumans()}}</time>
                            </div>
                            <div class="p-3 text-xs font-normal text-gray-200 rounded-lg bg-gray-500">{{$comment->comment}}</div>
                        </div>
                    </li>
                @endforeach
            </ol>
        @else
            <p>No comments yet, start a conversation</p>
        @endif
        
    </div>
    <div class="w-full rounded-md mt-5 px-5 max-h-[70px] overflow-y-auto">
        <div class="flex items-center justify-between mb-1 gap-5">
            <h2 class="text-sm font-bold">{{$post->title ? $post->title : '☆*.°• hello •°.*☆'}}</h2>
            <p class="text-[10px] opacity-70">{{$post->created_at->diffForHumans()}}</p>
        </div>
        <p class="text-xs opacity-70">{{$post->description}}</p>
    </div>

    <div class="px-5 mt-3">
        <livewire:like-post :post="$post"/>
    </div>

    <div class="flex items-center gap-1 text-cyan-600 text-[11px] mt-2 px-5">
        @if ($post->tags->count())
            @foreach ($post->tags as $tag)
                <span>#{{$tag->name}}</span>
            @endforeach
        @endif
    </div>

    <div class="md:absolute mt-5 md:mt-0 md:bottom-0 md:left-0 w-full bg-[#04070a] pt-5 md:pt-3 pb-10 md:pb-3 px-5 flex items-center gap-5 justify-between">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 -mt-3 fill-current" viewBox="0 0 24 24"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm-5 10.5A1.5 1.5 0 0 1 9.5 14c-.086 0-.168-.011-.25-.025-.083.01-.164.025-.25.025a2 2 0 1 1 2-2c0 .085-.015.167-.025.25.013.082.025.164.025.25zm4 1.5c-.086 0-.167-.015-.25-.025a1.471 1.471 0 0 1-.25.025 1.5 1.5 0 0 1-1.5-1.5c0-.085.012-.168.025-.25-.01-.083-.025-.164-.025-.25a2 2 0 1 1 2 2z"></path></svg>
        @auth
            <form wire:submit.prevent="postComment" class="w-full m-0 p-0 flex items-center justify-between gap-3">
                <textarea wire:model="comment" placeholder="Add a coment..." class="resize-none p-1 h-11 w-full focus:outline-none border-none bg-transparent"></textarea>
                @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 fill-current text-cyan-600" viewBox="0 0 24 24"><path d="m21.426 11.095-17-8A1 1 0 0 0 3.03 4.242l1.212 4.849L12 12l-7.758 2.909-1.212 4.849a.998.998 0 0 0 1.396 1.147l17-8a1 1 0 0 0 0-1.81z"></path></svg>
                </button>
            </form>
        @else
            <form class="w-full m-0 p-0 flex items-center justify-between gap-3">
                <textarea placeholder="Add a coment..." class="resize-none p-1 h-11 w-full focus:outline-none border-none bg-transparent"></textarea>
                <a href="{{route('login')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 fill-current text-cyan-600" viewBox="0 0 24 24"><path d="m21.426 11.095-17-8A1 1 0 0 0 3.03 4.242l1.212 4.849L12 12l-7.758 2.909-1.212 4.849a.998.998 0 0 0 1.396 1.147l17-8a1 1 0 0 0 0-1.81z"></path></svg>
                </a>
            </form>
        @endauth
    </div>

</div>

