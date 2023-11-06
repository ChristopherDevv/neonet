@extends('layouts.app')

@section('title') Not found @endsection

@section('content')
    <div class="height flex items-center justify-center">
        <div class="flex items-center justify-center flex-col gap-2 text-gray-400">
            <h3 class="font-bold text-4xl text-center">OOPS!!</h3>
            <p class="text-center">404 - Page not found</p>
        </div>
    </div>
@endsection

<style>
    .height{
        min-height: 500px !important;
    }
</style>