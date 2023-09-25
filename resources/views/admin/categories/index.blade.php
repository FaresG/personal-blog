@extends('admin.layout')
@section('title', 'Categories')
@section('content')
<div>
    @if(empty($categories))
        <h2>No categories available!</h2>
    @else
        <x-table
            :columnTitles="$columnTitles"
            :rowsValues="$rowsValues"
        />

        {{ $categories->onEachSide(0)->links() }}
    @endif
</div>
@endsection
