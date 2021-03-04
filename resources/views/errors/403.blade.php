@extends('layouts.full')

@section('content')
    <div class="p-10">
        {{ $exception->getMessage() }}
    </div>
@endsection
