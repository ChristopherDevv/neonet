<div>
    <button class="w-full"  data-modal-target="{{ $saludo }}" data-modal-toggle="{{ $saludo }}" type="button" class="">
        <img class="bg-gray-200 min-h-[100px] w-full h-full object-cover hover:scale-[105%] transition-all duration-500 rounded-xl " src="{{asset('uploads') . "/" . $post->image}}" alt="">
    </button>
       
    <div id="{{ $saludo }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 min-h-screen bg-opacity-90 backdrop-blur-[5px]">
        <div class="relative w-full md:w-[900px] md:overflow-hidden overflow-y-auto h-full md:h-[550px] bg-[#070A0F] rounded-xl">
            <div class="relative w-full h-full">
                <button type="button" class="absolute z-20 top-6 right-3 text-gray-200 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center bg-gray-900 bg-opacity-30 " data-modal-hide="{{ $saludo }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
              
                  <div id="modal-content" class="flex flex-col md:flex-row justify-between md:overflow-hidden  h-full w-full text-gray-300">
                      
                    <div class="w-full md:w-1/2 h-full flex items-center justify-center border-r border-r-gray-800">
                        <img class="w-full h-auto" src="{{asset('uploads' . '/' . $post->image)}}" alt="image {{$post->title}}">
                    </div>
                    
                    <div class="w-full md:w-1/2 h-full pt-7 pb-0 md:pt-5 md:pb-0  relative bg-[#070A0F]">
                        <div class="flex items-center gap-3 justify-between px-5">
                            <div class="flex items-center gap-1.5">
                                <a href="{{route('post.index', $post->user)}}"  class="h-10 w-10 rounded-full overflow-hidden">
                                    <img class="h-full w-full object-cover" src="{{$post->user->image ? asset('profiles' . '/' . $post->user->image) : asset('img/user-img.svg')}}" alt="Rounded avatar">
                                </a>
                                <div class="text-sm">
                                    <p>{{$post->user->name}}</p>
                                    <a href="{{route('post.index', $post->user)}}"  class="text-xs opacity-70"><span>@</span>{{$post->user->username}}</a>
                                </div>
                            </div>
                            <div class="md:mr-8">
                                <button onclick="copyToClipboard('{{ route('post.show', ['user' => $post->user, 'post' => $post]) }}')" data-popover-target="copied-click" type="button" class="items-center justify-center gap-1 text-white inline-flex animate-pulse focus:ring-4 focus:outline-none focus:ring-blue-300 transition-all hover:scale-110 duration-500 py-1 px-3 bg-gradient-to-tr from-blue-600 to-cyan-400 text-[10px] font-semibold text-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-3" viewBox="0 0 24 24"><path d="M14 8H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V10c0-1.103-.897-2-2-2z"></path><path d="M20 2H10a2 2 0 0 0-2 2v2h8a2 2 0 0 1 2 2v8h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"></path></svg>
                                    <span>Share post</span>
                                </button>
                                <div data-popover id="copied-click" role="tooltip" class="hidden absolute z-10 invisible text-xs transition-opacity duration-500 rounded-lg opacity-0 text-white bg-gray-800 py-2 px-3 text-center md:inline-flex items-center justify-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4" viewBox="0 0 24 24"><path d="M14 8H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V10c0-1.103-.897-2-2-2z"></path><path d="M20 2H10a2 2 0 0 0-2 2v2h8a2 2 0 0 1 2 2v8h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"></path></svg>
                                    <p>Copy</p>
                                </div>
                            </div>
                        </div>
                        <livewire:comment-post :post="$post">

                    </div>
                    
                  </div>
                    
            </div>
        </div>
    </div> 

</div>
