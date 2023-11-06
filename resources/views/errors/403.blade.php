@extends('layouts.app')

@section('title') Unauthorized @endsection

@section('content')
    <div class="height flex items-center justify-center">
        <div class="flex items-center justify-center flex-col gap-2 text-gray-400">
            <h3 class="font-bold text-4xl text-center">OOPS!!</h3>
            <p class="text-center">403 - Not authorized</p>
        </div>
    </div>
@endsection

<style>
    .height{
        min-height: 500px !important;
    }
</style>