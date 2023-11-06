@extends('layouts.app')

@section('title') search @endsection

@section('content')
    <div class="w-full min-h-screen relative mt-28 xl:mt-5">
       <livewire:search-users>
    </div>
@endsection

<style>
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
</style>