@props([
    'type' => 'submit',
    'name' => 'submit',
    'id' => '',
    'class' => '',
    'color' => 'yellow'
])

<button
    id="{{ $id }}"
    type="{{ $type }}"
    class="p-4 border rounded bg-{{ $color }}-300 border-{{ $color }}-300 min-w-[100px] {{ $class }}"
    name="{{ $name }}"
>{{ $slot }}</button>
