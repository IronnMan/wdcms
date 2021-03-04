@extends('layouts.app')

@section('content')
    <div class="mb-3 flex">
        <div class="mb-2 mr-2">
            <x-btn>默认</x-btn>
        </div>
        <div class="mb-2 mr-2">
            <x-btn type="info">info</x-btn>
        </div>
        <div class="mb-2 mr-2">
            <x-btn type="success">success</x-btn>
        </div>
        <div class="mb-2 mr-2">
            <x-btn type="warning">warning</x-btn>
        </div>
        <div class="mb-2 mr-2">
            <x-btn type="danger">danger</x-btn>
        </div>
    </div>


    <x-icon-logo class="w-8" />

@endsection
