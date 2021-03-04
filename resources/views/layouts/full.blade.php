@extends('layouts.base')

@section('body')
    <main class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-5xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        @yield('content')
        </div>
    </main>
@endsection
