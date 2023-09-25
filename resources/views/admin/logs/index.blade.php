@extends('admin.layout')
@section('title', 'Website Logs')

@section('content')
    <div>
        @if(empty($logs))
            <h2>You have no logs yet! Odd!</h2>
        @else
            <x-table
                :columnTitles="$columnTitles"
                :rowsValues="$rowsValues"
            />

            {{ $logs->onEachSide(0)->links() }}
        @endif
    </div>
@endsection
