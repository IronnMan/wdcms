@props(['action', 'method' => 'POST'])

@php
$_uid = 'btn-form-'.\Illuminate\Support\Str::random(7);
@endphp

<a href="javascript:;"
   onclick="event.preventDefault(); document.getElementById('{{ $_uid }}').submit();"
   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

    <form id="{{ $_uid }}" action="{{ $action }}" method="{{ $method }}"
          style="display: none;">
        @csrf
    </form>

    <span>{{ $slot }}</span>
</a>
