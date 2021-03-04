@extends('layouts.base')

@section('body')
    <main>
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </main>
@endsection
