@extends('layouts.app')

@section('title') about @endsection

@section('content')
    <div class="w-full mt-28 xl:mt-8">
        <div class="rounded-bg"></div>
   <div class=" max-w-[800px] w-full mx-auto">
    <div class="flex items-center justify-center">
        <h2 class="text-2xl md:3xl font-extrabold text-center w-full">
            "<span class="text-transparent bg-clip-text bg-gradient-to-r to-purple-700 from-cyan-400">NeoNet</span> Where freedom of
            <span class=""> expression and creativity </span>
            come together to be yourself🔥"
        </h2>
    </div>
    <section class="mt-10 w-full">
        <div class="w-5 h-7 bg-transparent border-[3px] border-gray-600 rounded"></div>
        <div class="flex flex-col md:flex-row items-start justify-between gap-10 mt-3 font-semibold text-[15px]">
            <div class="w-full md:w-1/2 p-5 border rounded-md">
                <p><span class="font-bold">Imagine</span> an online space where you can share your thoughts, interests and passions without restrictions. From discussing your tastes, anime, movies and favorite music to exploring <span class="font-bold">a minimalist aesthetic in your feed</span>, "Neonet" embraces diversity of interests and personal expression in its purest form. Here, you can interact with other users, express your opinions, discover new ideas, and organize your content in an elegant and unique way.</p>
            </div>
            <div class="w-full md:w-1/2 p-5 border rounded-md">
                <p>"Neonet" was born from a bold and passionate vision to create an online space where freedom of <span class="font-bold"> expression and authenticity </span> are the core values. The founder of "Neonet" dreamed of a place where the voices of all people could be heard without restrictions, where there were no limits to what could be shared and discussed. This vision crystallized as the growing need for <span class="font-bold">an online space where users were not limited by platforms</span>  that prioritize certain types of content or discussions was recognized. <span class="font-bold">"Neonet" continues to evolve to become an online haven</span>  for all those seeking to connect, express themselves and grow together.</p>
            </div>
        </div>
   </section>
   </div>
    </div>
   
@endsection

<style>
.rounded-bg {
    position: absolute;
    background-color: rgb(7, 148, 173);
    border-radius: 50%;
    filter: blur(110px);
    z-index: -2;
    width: 460px;
    height: 170px;
    left: 100px;
    top: -160px;
}
@media (min-width: 1120px) { 
.rounded-bg {
    position: absolute;
    background-color: rgb(7, 148, 173);
    border-radius: 50%;
    filter: blur(80px);
    z-index: -2;
    width: 400px;
    height: 130px;
    left: 100px;
    top: -160px;
}
}

</style>