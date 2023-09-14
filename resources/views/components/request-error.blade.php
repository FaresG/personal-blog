@props([
    'name'
])

@error($name)
<div class="w-full bg-red-300 border border-red-900 px-5 py-3 text-sm mb-1">
    {{ $message }}
</div>
@enderror
