<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200">
    <x-navigation />
    @if(\Illuminate\Support\Str::startsWith(\Illuminate\Support\Facades\Route::currentRouteName(), 'posts.'))
    <x-sub-navigation>
        <x-link>
            <x-slot:route>{{ route('posts.create') }}</x-slot:route>
            New Post
        </x-link>

    </x-sub-navigation>
    @elseif(\Illuminate\Support\Str::startsWith(\Illuminate\Support\Facades\Route::currentRouteName(), 'profile.'))
    <x-sub-navigation>
        <x-link>
            <x-slot:route>{{ route('profile.edit') }}</x-slot:route>
            Edit Profile
        </x-link>
    </x-sub-navigation>
    @endif
    <x-flash />
    <h1 class="text-xl text-center p-4">@yield('title')</h1>
    <div class="overflow-hidden px-[25vw] ">
        <div class="content bg-white p-10">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>
