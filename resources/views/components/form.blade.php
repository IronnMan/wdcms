@props(['hasFiles' => false])

<form {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!} {{ $attributes }}>
    @csrf

    {{ $slot }}
</form>
