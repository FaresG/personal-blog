@if(session('success'))
    <div class="text-center bg-green-300 py-3">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="text-center bg-red-300 py-3">
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('warning'))
    <div class="text-center bg-yellow-300 py-3">
        {{ session('warning') }}
    </div>
@endif

@if(session('info'))
    <div class="text-center bg-blue-300 py-3">
        {{ session('info') }}
    </div>
@endif
