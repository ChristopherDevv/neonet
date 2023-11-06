<div>
    <div class="rounded-bg"></div>
    <section class="mx-auto max-w-md">
        <h2 class="text-[27px] md:text-3xl font-extrabold text-center mb-7"><span class="text-transparent bg-clip-text bg-gradient-to-r to-purple-700 from-cyan-400">Search friends!!</span></h2>
        <form wire:submit.prevent="searchUser"> 
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                    <svg class="w-4 h-4 text-purple-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/></svg>
                </div>
                <input wire:model="search" type="search"  class="shadow-md shadow-purple-400 w-full font-bold py-3 pl-11 pr-[80px] rounded-full border-none border-transparent focus:outline-none" autofocus>
                <button onclick="searchStar()" type="submit" class="text-purple-600 absolute right-3 bottom-2 bg-purple-200 font-semibold rounded-xl text-xs py-2 px-3">Search</button>
            </div>
        </form>
        @error('search')
            <div class="flex items-center justify-center">
                <span class="text-red-500 text-xs text-center py-1 px-3 rounded-full bg-red-300 bg-opacity-20">{{ $message }}</span>
            </div>
        @enderror
      
    </section>
 
    <div id="spinner-search" class="mt-14 items-center justify-center hidden">
        <div role="status">
            <svg aria-hidden="true" class="inline w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    @if($userNotFound)
        <div class="mt-14 flex items-center justify-center flex-col gap-2 text-gray-300">
            <h3 class="font-bold text-2xl text-center">OOPS!!</h3>
            <p class="text-center">User not fount</p>
        </div>
    @endif
    
    <div class="mt-14 lg:pl-10 lg:pr-10 w-full grid items-center gap-6 md:gap-10 grid-cols-1 md:grid-cols-3 text-gray-300">
        @if($users)
            @foreach ($users as $user )
                <div class="w-full flex items-center gap-5 py-3 px-4 rounded-xl bg-blue-400 bg-opacity-10">
                    <div class="flex items-center gap-3">
                        <a href="{{route('post.index', $user)}}" class="cursor-pointer">
                            <div class="h-12 w-12 md:h-14 md:w-14 overflow-hidden rounded-full flex items-center justify-center relative">
                                <img class="w-full h-full object-cover" src="{{$user->image ? asset( 'profiles' . '/' . $user->image ) : asset('img/user-img.svg') }}" alt="user image">
                            </div>
                        </a>
                        
                        <div>
                            <p class="font-bold text-xs">{{$user->name}}</p>
                            <a href="{{route('post.index', $user)}}">
                                <p class="opacity-70 text-xs">@<span>{{$user->username}}</span></p>
                            </a>
                        </div>
                    </div>
                    <a href="{{route('post.index', $user)}}" class="inline-block mt-2 md:mt-0 bg-gradient-to-br rounded-full from-blue-700 to-cyan-400 py-1 px-4 text-white text-[10px] font-semibold">
                        View
                    </a>
                </div>
            @endforeach
        @endif
        @if ($firstUsers)
            @foreach ($firstUsers as $user )
            <div class="w-full flex items-center gap-5 py-3 px-4 rounded-xl bg-blue-400 bg-opacity-10">
                <div class="flex items-center gap-3">
                    <a href="{{route('post.index', $user)}}" class="cursor-pointer">
                        <div class="h-12 w-12 md:h-14 md:w-14 overflow-hidden rounded-full flex items-center justify-center relative">
                            <img class="w-full h-full object-cover" src="{{$user->image ? asset( 'profiles' . '/' . $user->image ) : asset('img/user-img.svg') }}" alt="user image">
                        </div>
                    </a>
                    
                    <div>
                        <p class="font-bold text-xs">{{$user->name}}</p>
                        <a href="{{route('post.index', $user)}}">
                            <p class="opacity-70 text-xs">@<span>{{$user->username}}</span></p>
                        </a>
                    </div>
                </div>
                <a href="{{route('post.index', $user)}}" class="inline-block mt-2 md:mt-0 bg-gradient-to-br rounded-full from-blue-700 to-cyan-400 py-1 px-4 text-white text-[10px] font-semibold">
                    View
                </a>
            </div>
        @endforeach
        @endif
    </div>
</div>
