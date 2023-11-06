@extends('layouts.app')

@section('title') Account @endsection

@section('content') 
<div class="mt-[84px] xl:mt-5 w-full mx-auto">
    <div class="relative flex items-center bg-gray-200 p-0 overflow-hidden bg-center bg-cover min-h-[200px] rounded-xl" style="background-image: url('{{ $user->coverimg ? asset('coversimg' . '/' . $user->coverimg) : '' }}'); background-position-y: 50%">
        {{-- <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-slate-700 to-slate-400 opacity-80"></span> --}}
    </div>
    <div class="relative -mt-20 border-0 mx-auto flex items-center justify-center">
        <div class="w-full flex flex-col md:flex-row md:items-end gap-3 items-center justify-center">
            <div class="flex items-center justify-center flex-col">
                <div class="w-36 h-36 rounded-full bg-gray-50 flex items-center justify-center">
                    <button data-modal-target="profile-image" data-modal-toggle="profile-image" class="transition-all hover:scale-[104%] duration-500 w-32 h-32 rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover" src=" {{ $user->image ? asset('profiles' . '/' . $user->image) : asset('img/user-img.svg')}}" alt="user image">
                    </button>
                    <div id="profile-image" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 backdrop-filter backdrop-blur-[10px] min-h-screen bg-opacity-90">
                        <div class="relative w-60 h-60 md:w-72 md:h-72 overflow-hidden rounded-full bg-gray-500 max-h-full flex items-center justify-center mx-auto">
                            <img class="w-full h-full object-cover" src=" {{ $user->image ? asset('profiles' . '/' . $user->image) : asset('img/user-img.svg')}}" alt="user image">
                        </div>
                    </div>
                </div>
                @auth
                    @if ($user->id === auth()->user()->id)
                        <a href="{{route('post.create')}}" class="inline py-2 px-9 text-sm text-white rounded-full text-center bg-neutral-900 active:opacity-50 transition-all duration-500 hover:bg-opacity-80">Post</a>
                    @else
                        @if ($user->virifyFollower())
                            <form action="{{route('users.unfollow', $user)}}" method="POST" class="m-0">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="inline py-2 px-5 text-sm text-white rounded-full bg-neutral-900 text-center active:opacity-50 transition-all duration-500 hover:bg-opacity-80">Following</button>
                            </form>
                        @else
                            <form action="{{route('users.follow', $user)}}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="inline py-2 px-7 text-sm text-white rounded-full bg-neutral-900 text-center active:opacity-50 transition-all duration-500 hover:bg-opacity-80">Follow</button>
                            </form>
                        @endif
                      
                    @endif
                @else
                    <a href="{{route('login')}}" class="inline py-2 px-7 text-sm text-white rounded-full bg-neutral-900 text-center active:opacity-50 transition-all duration-500 hover:bg-opacity-80">Follow</a>
                @endauth
            </div>
            <div>
                @auth
                    @if ($user->id === auth()->user()->id)
                    <a href="{{route('profile.index', $user)}}" class="z-10 fixed bottom-5 right-5 md:bottom-8 md:right-5 h-[48px] w-[48px] md:h-[53px] md:w-[53px] transition-all duration-500 hover:scale-110 rounded-full bg-gradient-to-tr from-blue-700 to-cyan-400 flex flex-col text-white items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-auto fill-current" viewBox="0 0 24 24"><path d="M8.707 19.707 18 10.414 13.586 6l-9.293 9.293a1.003 1.003 0 0 0-.263.464L3 21l5.242-1.03c.176-.044.337-.135.465-.263zM21 7.414a2 2 0 0 0 0-2.828L19.414 3a2 2 0 0 0-2.828 0L15 4.586 19.414 9 21 7.414z"></path></svg>
                    </a>
                    @endif
                @endauth
                <div class="flex flex-col md:flex-row items-center md:items-end gap-3 ">
                    <div class="flex items-end gap-3">
                        <div>
                            <p class="font-bold text-lg">{{$user->name }}</p>
                            <p class="opacity-50 text-sm font-medium">@<span>{{$user->username }}</span></p>
                        </div>
                        <div class="flex flex-col">
                            <div data-popover-target="popover-user-profile" class="font-bold inline text-sm pt-1 cursor-default">{{$user->followers->count()}} <span class="opacity-50 text-xs font-medium">Followers</span>
                                <div data-popover id="popover-user-profile" role="tooltip" class="absolute inset-popover z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                                    <div class="p-3 flex flex-col gap-1 max-h-popover">
                                        @foreach ($user->followers as $follower)
                                            <div class="w-full flex items-center justify-between">
                                               <div class="w-2/3 flex items-center gap-1.5">
                                                <a href="{{route('post.index', $follower)}}">
                                                    <div class="h-10 w-10 rounded-full overflow-hidden">
                                                        <img class="h-full w-full object-cover" src="{{$follower->image ? asset('profiles' . '/' . $follower->image) : asset('img/user-img.svg')}}" alt="Rounded avatar">
                                                    </div>
                                                </a>
                                                <div class="text-xs">
                                                    <p><span>{{$follower->name}}</p>
                                                    <a href="{{route('post.index', $follower)}}" class="text-[8.5px] opacity-70"><span>@</span>{{$follower->username}}</a>
                                                </div>
                                               </div>
                                               <div class="w-1/3">
                                                    <a href="{{route('post.index', $follower)}}" class="p-1 font-normal rounded-full text-center block bg-gradient-to-tr from-blue-700 to-cyan-400 w-full text-xs text-white">View</a>
                                               </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                             </div>
                            <div data-popover-target="popover-user-profile2" class="font-bold inline text-sm pt-1 cursor-default">{{$user->followings->count()}} <span class="opacity-50 text-xs font-medium">Following</span>
                                <div data-popover id="popover-user-profile2" role="tooltip" class="absolute inset-popover z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                                    <div class="p-3 flex flex-col gap-1 max-h-popover">
                                        @foreach ($user->followings as $following)
                                            <div class="w-full flex items-center justify-between">
                                               <div class="w-2/3 flex items-center gap-1.5">
                                                <div class="h-10 w-10 rounded-full overflow-hidden">
                                                    <img class="h-full w-full object-cover" src="{{$following->image ? asset('profiles' . '/' . $following->image) : asset('img/user-img.svg')}}" alt="Rounded avatar">
                                                </div>
                                                <div class="text-xs">
                                                    <p><span>{{$following->name}}</p>
                                                    <p class="text-[8.5px] opacity-70"><span>@</span>{{$following->username}}</p>
                                                </div>
                                               </div>
                                               <div class="w-1/3">
                                                    <a href="{{route('post.index', $following)}}" class="p-1 font-normal rounded-full text-center block bg-gradient-to-tr from-blue-700 to-cyan-400 w-full text-xs text-white">View</a>
                                               </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                             </div>
                             
                        </div>
                    </div>
                    <div class="">
                        @if ($user->url)
                            <a href="{{$user->url ? $user->url : '#'}}" target="_blank" class="flex items-center gap-1 opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5" viewBox="0 0 24 24"><path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path></svg>
                                <p class="underline text-xs">
                                    <?php
                                        $url = $user->url;
                                        $parsedUrl = parse_url($url);
                                        if ($parsedUrl !== false && isset($parsedUrl['host'])) {
                                            $host = str_replace('www.', '', $parsedUrl['host']);
                                            echo $host . (isset($parsedUrl['path']) ? $parsedUrl['path'] : '');
                                        }
                                    ?>
                                </p>
                            </a>
                        @else
                            <a href="#" class="flex items-center gap-1 opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5" viewBox="0 0 24 24"><path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path></svg>
                            </a>
                        @endif
                        <p class="text-sm mt-3 md:ml-[1px] md:mt-1 text-center md:text-start cursor-default">{{$user->description ? $user->description : '🤍'}}</p>
                    </div>
                </div>
            </div>

        </div>
     </div>
       
     {{-- 
        
        HERE START CHAGES
        <livewire:post-modal :post="$post">
        --}}
      
      <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 min-h-screen bg-opacity-90 backdrop-blur-[5px]">
          <div class="relative w-full md:w-[900px] md:overflow-hidden overflow-y-auto h-full md:h-[550px] bg-[#070A0F] rounded-xl">
              <div class="relative w-full h-full">
                  <button type="button" class="absolute z-20 top-7 right-3 text-gray-200 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center bg-gray-900 bg-opacity-30 " data-modal-hide="popup-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                
                    <div id="modal-content" class="flex flex-col md:flex-row justify-between h-full w-full text-gray-300">
                        
                        <div class="w-full md:w-1/2 h-full flex items-center justify-center border-r border-r-gray-800">
                            <img class="w-full h-auto" src="{{asset('img/header-image2.jpg')}}" alt="image post">
                        </div>
                        <div class="w-full md:w-1/2 h-full pt-7 pb-7 md:pt-5 md:pb-0 md:overflow-hidden relative bg-[#070A0F]">
                           
                            <a href="#" class="md:hidden  mx-5 bg-gradient-to-br rounded-full from-blue-700 to-cyan-400 py-1.5 px-5 text-white text-xs font-semibold">
                                See more
                            </a>
                           <div class="flex items-center gap-1.5 px-5">
                               <div class="h-10 w-10 rounded-full overflow-hidden">
                                   <img class="h-full w-full object-cover" src="{{asset('img/post-1.jpg')}}" alt="Rounded avatar">
                               </div>
                               <div class="text-sm">
                                   <p><span>Lila lala</p>
                                   <p class="text-xs opacity-70"><span>@</span>lila lala</p>
                               </div>
                           </div>
                               <div class="hidden md:block h-[250px] w-full rounded-md bg-[#04070a]">
                                <ol class="relative border-l border-gray-500">                  
                                    <li class="mb-10 m-li">
                                        <span class="absolute flex items-center justify-center rounded-full w-6 h-6 bg-black overflow-hidden -left-3 ring-8 ring-gray-500 ">
                                            <img class="shadow-lg w-full h-full object-cover" src="" alt="profile image"/>
                                        </span>
                                        <div class="p-4 rounded-lg shadow-sm bg-gray-900">
                                            <div class="items-center justify-between mb-3 sm:flex">
                                                <time class="mb-1 text-xs font-normal sm:order-last sm:mb-0">hours ago</time>
                                                <div class="text-xs font-normal text-gray-200">
                                                    <p>Member of Neonet</p>
                                                </div>
                                            </div>
                                            <div class="p-3 text-xs font-normal text-gray-200 rounded-lg bg-gray-500">There this publication.</div>
                                        </div>
                                    </li>
                                </ol>
                               </div>
                               <div class="w-full rounded-md mt-5 px-5 max-h-[70px] overflow-y-auto">
                                   <div class="flex items-center justify-between mb-1 gap-5">
                                       <h2 class="text-sm font-bold">☆*.°• hello •°.*☆</h2>
                                       <p class="text-[10px] opacity-70">2 days ago</p>
                                   </div>
                                   <p class="text-xs opacity-70 ">Hello hello hello</p>
                               </div>
                   
                               <div class="mt-5 flex items-center justify-between gap-2 px-5">
                                   
                                   <div class="flex items-center gap-1 text-cyan-600 text-[11px]">
                                       <p>#Neonet</p>
                                       <p>#Art</p>
                                       <p>#Nature</p>
                                   </div>
                               </div>
                               <div class="hidden md:flex md:absolute mt-5 md:mt-0 md:bottom-0 md:left-0 w-full bg-[#04070a] pt-5 md:pt-3 pb-10 md:pb-3 px-5 items-center gap-5 justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 -mt-3 fill-current" viewBox="0 0 24 24"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm-5 10.5A1.5 1.5 0 0 1 9.5 14c-.086 0-.168-.011-.25-.025-.083.01-.164.025-.25.025a2 2 0 1 1 2-2c0 .085-.015.167-.025.25.013.082.025.164.025.25zm4 1.5c-.086 0-.167-.015-.25-.025a1.471 1.471 0 0 1-.25.025 1.5 1.5 0 0 1-1.5-1.5c0-.085.012-.168.025-.25-.01-.083-.025-.164-.025-.25a2 2 0 1 1 2 2z"></path></svg>
                                <form action="" class="w-full m-0 p-0">
                                    <textarea name="description" placeholder="Add a coment..." class="resize-none p-1 h-11 w-full focus:outline-none border-none bg-transparent"></textarea>
                                </form>
                                <a href="#" class="bg-gradient-to-br rounded-full from-blue-700 to-cyan-400 py-1.5 w-[93px] text-center text-white text-[10px] font-semibold">
                                    See more
                                </a>
                            </div>
                       </div>
                      
                    </div>
                      
              </div>
          </div>
      </div> 
         
    <h3 class="my-14 font-bold text-sm uppercase tracking-[1px] text-center w-full ">Gallery</h3>
    <section class="mx-auto">
        @if ($posts->count())
        <div id="loading" class="mx-auto my-20 flex items-center justify-center">
            @component('layouts.components.spinner') @endcomponent
        </div>
            <div class="container container_1  w-full md:max-w-5xl mx-auto opacity-0 scale-105 md:scale-100 mt-20 md:mt-0">
                @foreach ($posts as $post )
                    <div class="w-full item">
                        <button onclick="openModal({{$post->comments->count() ? $post->comments : '[]' }}, {{$post}}, {{$post->user}}, {{$post->tags}}, {{$post->likes}}, {{ auth()->check() ? $post->checkLike(auth()->user()) : 'false'}})" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"> {{-- onclick="openModal({{$post->comments->count() ? $post->comments : '[]' }}, {{$post}}, {{$post->user}}, {{$post->tags}}, {{$post->likes}}, {{ auth()->check() ? $post->checkLike(auth()->user()) : 'false'}})" --}}
                            <img class="w-full hover:scale-110 z-30 rounded-lg transform transition-all duration-700" src="{{asset('uploads') . "/" . $post->image}}" alt="image {{$post->title}}">
                        </button>
                    </div>
                 @endforeach
            </div>

            <div class="mt-28 md:mt-0">
                {{$posts->links('pagination::tailwind')}}
            </div>
        @else 

        <div class="mx-auto w-full flex items-center justify-center">
            <div class="w-60 h-72 bg-[#070A0F] rounded-md flex flex-col">
                <div class="flex items-center gap-1 p-3">
                    <span class="h-2 w-2 rounded-full bg-orange-500"></span>
                    <span class="h-2 w-2 rounded-full bg-yellow-500"></span>
                    <span class="h-2 w-2 rounded-full bg-green-300"></span>
                </div>
                <div class="w-full h-full overflow-hidden px-1.5 pb-1.5">
                    <div class="w-ful h-full bg-white flex items-center justify-center">
                        <p class="text-center">Launching soon</p>
                    </div>
                </div>
            </div>
        </div>
            
        @endif
    </section>
   
</div>

@endsection

<style>
.container {
  width: 100%;
  position: relative;
}
.item {
  position: absolute;
  text-align: center;
  padding: 5px;
}
.inset-popover {
    inset: auto auto -10px 0px !important;
  
}
.max-h-popover{
    max-height: 250px !important;
    overflow-y: auto !important;
}

.p-comments{
    padding: 20px 30px;
}
.m-li{
    margin-left: 30px;
}

</style>