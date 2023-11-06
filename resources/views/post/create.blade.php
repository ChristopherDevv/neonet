@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('title') post-create @endsection

@section('content')
    <div class="mt-[90px] xl:mt-8 w-full mx-auto">
        <div class="relative mx-3 md:mx-6 flex items-center p-0 overflow-hidden bg-center bg-cover min-h-[170px] rounded-xl">
            <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-slate-700 to-slate-400 opacity-80"></span>
        </div>
        <div class="relative min-w-0 px-4 lg:px-28 lg:py-10 py-7 mx-3 md:mx-6 -mt-[170px] lg:-mt-[170px] overflow-hidden border-0 rounded-xl bg-gray-50 bg-opacity-50 backdrop-filter backdrop-blur-[33px]">
            <div class="flex flex-col md:flex-row lg:items-start justify-between gap-5 md:gap-20">
               <div class="w-full md:w-1/2">
                    <form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone cursor-pointer min-h-[200px] bg-gray-50 bg-opacity-0 border-none rounded-lg w-full text-center flex items-center justify-center ">
                        @csrf
                        <div id="upload-div" class="w-full h-[290px] md:h-[330px] bg-gray-100 border-2 border-dashed border-gray-400 rounded-2xl -z-10 flex flex-col items-center justify-center p-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-auto fill-current text-neutral-900" viewBox="0 0 24 24"><path d="M18.944 11.112C18.507 7.67 15.56 5 12 5 9.244 5 6.85 6.611 5.757 9.15 3.609 9.792 2 11.82 2 14c0 2.757 2.243 5 5 5h11c2.206 0 4-1.794 4-4a4.01 4.01 0 0 0-3.056-3.888zM13 14v3h-2v-3H8l4-5 4 5h-3z"></path></svg>
                            <p class="font-bold text-center text-sm">Click to upload <span class="font-normal">or drag and drop</span></p>
                            <p class="text-[10px] max-w-[200px] mt-2">SVG, PNG, JPG or GIF <span>(WE RECOMMEND 800x400px)</span></p>
                        </div>
                    </form>
                    @error('image')
                    <div class="flex items-center justify-center w-full mt-3">
                        <span class="text-red-500 text-xs text-center py-1 px-3 rounded-full bg-red-300 bg-opacity-20">{{ $message }}</span>
                    </div>
                   @enderror
               </div>
                
               <div class="w-full md:w-1/2">
                    <form action="{{route('post.store')}}" method="POST" novalidate>
                        @csrf
                        <div class="rounded-xl px-3 py-1.5 w-full bg-[#222222] text-white">
                            <label for="title" class="text-xs opacity-50">Title</label>
                            <input id="title" name="title" type="text" value="{{ old('title') }}" class="p-1 border-none bg-transparent border-transparent w-full focus:outline-none">
                            @error('title')
                            <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                            @enderror
                        </div>
                        <div class="rounded-xl px-3 py-1.5 w-full mt-5 bg-[#222222] text-white">
                            <label for="description" class="text-xs opacity-50">Description</label>
                            <textarea name="description" id="description" class="resize-none  p-1 h-20 w-full focus:outline-none border-none bg-transparent" >{{old('description')}}</textarea>
                            @error('description')
                            <p class="text-xs font-bold text-red-500"> {{$message}} </p> 
                            @enderror
                        </div> 
                        <div class="mt-5">
                            <input type="hidden" name="image" value="{{old('image')}}">
                        </div>
                        
                        <div id="post-tags" class="mt-5 flex items-center gap-2 flex-wrap">
                            <div class="post-tag w-14 h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Manga" name="tag1" value="Manga" class="w-14 h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Manga</span>
                            </div>
                            <div class="post-tag w-[70px] h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Minimalist" name="tag2" value="Minimalist" class="w-[70px] h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Minimalist</span>
                            </div>
                            <div class="post-tag w-14 h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Clean" name="tag3" value="Clean" class="w-14 h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Clean</span>
                            </div>
                            <div class="post-tag w-14 h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Desing" name="tag4" value="Desing" class="w-14 h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Desing</span>
                            </div>
                            <div class="post-tag w-16 h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Simplicity" name="tag5" value="Simplicity" class="w-16 h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Simplicity</span>
                            </div>
                            <div class="post-tag w-14 h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Music" name="tag6" value="Music" class="w-14 h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Music</span>
                            </div>
                            <div class="post-tag w-12 h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Art" name="tag7" value="Art" class="w-12 h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Art</span>
                            </div>
                            <div class="post-tag w-12 h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Anime" name="tag8" value="Anime" class="w-12 h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Anime</span>
                            </div>
                            <div class="post-tag w-14 h-6 bg-black text-white rounded-full inline-flex relative items-center justify-center bg-opacity-50">
                                <input type="checkbox" id="Style" name="tag9" value="Style" class="w-14 h-6 opacity-0 z-10 absolute cursor-pointer">
                                <span class="text-[10px] absolute">#Style</span>
                            </div>
                        </div>
                        <div class="text-center mt-6 flex">
                            <button type="submit" onclick="this.disabled = true; this.form.submit();"  class="inline-block w-full p-3 font-bold text-center text-white uppercase align-middle bg-transparent border-0 rounded-full cursor-pointer shadow text-xs bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-[1.02] transition-all duration-300  active:opacity-50">Share post</button>
                        </div>
                    </form>
               </div>
    
            </div>
        </div>
    </div>
@endsection

<style>
.dropzone {
    padding: 0% !important;
    border: none !important;
    margin: 0% !important;
}
.dropzone .dz-preview.dz-image-preview {
    background: transparent !important;
}
.dz-remove{
    background: linear-gradient(to bottom right, #f52525, #ff636b);
    color: white;
    padding: 0.30rem 0.75rem;
    border-radius: 9999px;
    text-align: center;
    font-size: 12px !important;
    margin-top: 10px;
    display: inline;
}
.dropzone .dz-preview .dz-image {
    width: 250px !important;
    height: 250px !important;
}
.dropzone .dz-preview{
    margin: 0px !important;
}

</style>