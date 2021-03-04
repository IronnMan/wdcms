@extends('layouts.base')

@section('bodyClass', 'bg-white')
@section('body')
    <main class="flex flex-col">
        @if(Route::has('login'))
            <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                @if(auth()->guard('landlord')->check())
                    <a href="{{ route('admin.home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('dashboard') }}</a>
                @else
                    <a href="{{ route('admin.login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('sign in') }}</a>
                @endif
            </div>
        @endif

        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-col justify-around h-full">
                <div>
                    <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                        <x-icon-logo class="mx-auto"></x-icon-logo>
                    </h1>
                    <ul class="flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
                        <li>
                            <a href="/docs" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Documentation">Documentation</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Tailwind Css">Tailwind CSS</a>
                        </li>
                        <li>
                            <a href="https://github.com/alpinejs/alpine" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="AlpineJs">AlpineJs</a>
                        </li>
                        <li>
                            <a href="https://www.laravel-livewire.com/" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Tailwind Css">Livewire</a>
                        </li>
                        <li>
                            <a href="https://laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laracasts">Laravel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
