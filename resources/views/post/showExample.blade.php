@extends('layouts.app')

@section('title') post @endsection

@section('content')
    <div class="flex flex-col md:flex-row items-start justify-between md:gap-10 mt-24 xl:mt-5 w-full mx-auto">
        <div class="w-full md:w-1/3">
            <div class="shadow-generator  relative flex items-center p-0  bg-center min-h-[350px] bg-cover object-contain" style="background-image: url('{{asset('uploads') . '/' . $post->image}}" alt="image {{$post->title}}'); background-position-y: 50%">
                <div class="shadow-generator absolute inset-y-0 p-10 w-full h-full bg-white bg-opacity-[0.3] backdrop-filter backdrop-blur-[15px] flex flex-col items-center justify-center">
                    <img class="h-[170px] w-auto rounded-xl" src="{{asset('uploads' . '/' . $post->image)}}" alt="image {{$post->title}}">
                    <div class="w-[170px] h-auto p-2 bg-white bg-opacity-40 rounded-lg mt-2 flex items-center justify-center gap-2">
                    

                        <livewire:like-post :post="$post"/>

                     
                    </div>
                </div>
            </div>
            <div class="min-h-[100px] bg-gray-100 rounded-xl w-full px-5 mb-7 md:hidden py-5 md:px-10 md:py-7 flex items-center flex-col md:flex-row justify-center gap-2">
                <div class="w-full md:w-1/2">
                     <h2 class="md:text-xl font-bold">{{$post->title}}</h2>
                     <div class="flex items-center gap-3 mt-1">
                        <div class="flex items-center md:flex-row gap-3">
                            <p class="font-semibold text-sm md:text-base">@<span>{{$post->user->username}}</span></p>
                            <p class="text-xs">{{$post->created_at->diffForHumans()}}</p>                 
                        </div>
                        @auth
                            @if ($post->user_id === auth()->user()->id)
                                <form action="{{route('post.destroy', $post)}}" method="POST" class="m-0">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="inline-block text-xs py-1 px-2 text-center text-white rounded bg-gradient-to-tl from-red-600 to-pink-400 hover:scale-105 transition-all duration-300  active:opacity-50">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="w-full md:w-1/2 shadow-md text-xs md:text-sm bg-gray-50 p-4 rounded-lg">
                     <p>{{$post->description}}</p>
                   
                </div>
             </div>
           @if (session('commentMessage'))
            <div class="mb-7 flex items-center justify-center gap-3 w-full max-w-xs mx-auto p-4 text-gray-500 bg-white rounded-lg shadow-md">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>
                </div>
                <div class="text-sm text-green-500 font-medium">Comment sucessfully added</div>
            </div> 
           @endif
          
           @if($post->comments->count())
            <ol class="relative border-l border-gray-300 ml-6">
                @foreach ($post->comments as $comment)                  
                    <li class="mb-10 ml-6">
                        <span class="absolute flex items-center justify-center w-6 h-6  rounded-full -left-3 ring-8 ring-gray-300 ">
                            <img class="rounded-full shadow-lg" src="{{asset('img/default-user.png')}}" alt="profile image"/>
                        </span>
                        <div class="p-4 border rounded-lg shadow-sm bg-gray-100">
                            <div class="items-start justify-between mb-3 flex gap-2">
                                <div class="text-sm font-normal text-gray-500">
                                    <p>{{$comment->user->name}} member of NeoNet </p>
                                    <a href="{{route('post.index',$comment->user )}}" class="font-semibold text-gray-900  hover:underline"><span>@</span>{{$comment->user->username}}</a>
                                </div>
                                <p class="text-xs font-normal mt-[2px] opacity-60">{{$comment->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="p-3 text-xs font-normal text-gray-500 rounded-lg bg-gray-200">{{$comment->comment}}</div>
                        </div>
                    </li>
                @endforeach
                </ol>
           @else
            <ol class="relative border-l border-gray-300 ml-6">                  
                <li class="mb-10 ml-6">
                    <span class="absolute flex items-center justify-center w-6 h-6  rounded-full -left-3 ring-8 ring-gray-300 ">
                        <img class="rounded-full shadow-lg" src="{{asset('img/default-user.png')}}" alt="profile image"/>
                    </span>
                    <div class="p-4 border rounded-lg shadow-sm bg-gray-100">
                        <div class="items-center justify-between mb-3 sm:flex">
                            <time class="mb-1 text-xs font-normal sm:order-last sm:mb-0">hours ago</time>
                            <div class="text-sm font-normal text-gray-500">
                                <p>Member of Neonet</p>
                                <a href="#" class="font-semibold text-gray-900  hover:underline">Member</a>
                            </div>
                        </div>
                        <div class="p-3 text-xs font-normal text-gray-500 rounded-lg bg-gray-200">There are no comments in this publication.</div>
                    </div>
                </li>
            </ol>
           @endif
        </div>
        <div class="w-full md:w-2/3">
            <div class="min-h-[100px] bg-gray-100 rounded-xl w-full px-5 py-5 md:px-10 md:py-7 md:flex items-center hidden flex-col md:flex-row justify-center gap-2">
               <div class="w-full md:w-1/2">
                    <h2 class="md:text-xl font-bold">{{$post->title}}</h2>
                    <div class="flex items-center flex-col md:flex-row gap-3 mt-1">
                        <div class="flex md:items-center flex-col md:flex-row md:gap-3 ">
                            <p class="font-semibold text-sm md:text-base">@<span>{{$post->user->username}}</span></p>
                            <p class="text-xs">{{$post->created_at->diffForHumans()}}</p>                 
                        </div>
                       @auth
                            @if ($post->user_id === auth()->user()->id)
                            <form action="{{route('post.destroy', $post)}}" method="POST" class="m-0">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="inline-block text-xs py-1 px-2 text-center text-white rounded bg-gradient-to-tl from-red-600 to-pink-400 hover:scale-105 transition-all duration-300  active:opacity-50">
                                    Delete
                                </button>
                            </form>
                            @endif
                       @endauth
                    </div>
               </div>
               @if ($post->description)
                <div class="w-full md:w-1/2 shadow-md text-xs md:text-sm bg-gray-50 p-4 rounded-lg">
                    <p>{{$post->description}}</p>
                </div>
               @endif
               
            </div>
            <div class="md:mt-5 relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-[100px] rounded-xl" style="background-image: url('{{ asset('img/curved0.jpg') }}'); background-position-y: 50%">
                <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-700 to-cyan-400 opacity-80"></span>
            </div>
            <div class="relative min-w-0 px-4 lg:px-8 py-7 mx-3 md:mx-6 -mt-16 lg:-mt-14 overflow-hidden border-0 rounded-xl bg-white bg-opacity-50 shadow-lg backdrop-filter backdrop-blur-[33px]">
                <form action="{{route('comment.store', ['post' => $post, 'user' => $user])}}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-1">
                        <label for="comment" class="font-bold opacity-90">Add a comment</label>
                        <textarea name="comment" id="comment" placeholder="Comment" class="rounded-md resize-none bg-gray-50  md:bg-white md:shadow-none  p-3 h-20 w-full focus:outline-none  @error('comment') border border-red-500 @enderror">{{old('comment')}}</textarea>
                        @error('comment')
                        <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                       @enderror
                    </div>
                    <div class="text-center mt-5 flex">
                        @auth
                            <button type="submit" class="inline-block w-full md:w-auto  px-9 py-3 font-bold text-center text-white uppercase align-middle bg-transparent border-0 rounded-lg cursor-pointer shadow text-xs bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-[1.02] transition-all duration-300  active:opacity-50">Comment</button>
                        @else
                            <a href="{{route('login')}}" class="inline-block  px-9 py-3 font-bold text-center text-white uppercase align-middle bg-transparent border-0 rounded-lg cursor-pointer shadow text-xs bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-[1.02] transition-all duration-300  active:opacity-50">Comment</a>
                        @endauth
                       
                    </div>
                    @if ($post->tags->count())
                        @foreach ($tags as $tag)
                            <span class="mx-2 py-1 px-2 text-[10px] bg-black rounded-full text-center text-white">#{{ $tag->name }}</span>
                        @endforeach
                    @endif

                    
                </form>
            </div>
        </div>
    </div>
    
@endsection

<style>
    .shadow-generator{
        -webkit-box-shadow: inset 0px 0px 40px 47px rgba(249,250,251,1);
-moz-box-shadow: inset 0px 0px 40px 47px rgba(249,250,251,1);
box-shadow: inset 0px 0px 40px 47px rgba(249,250,251,1);
    }
</style>