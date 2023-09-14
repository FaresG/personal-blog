@props(['name'])

<x-request-error :name="$name" />
<div class="flex gap-4 items-center mb-3">
    {{ $slot }}
</div>
