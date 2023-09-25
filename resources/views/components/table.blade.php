
@props([
    'columnTitles' => [],
    'rowsValues' => []
])

<div class="border rounded-xl pt-8 my-8">
    <table class="table-fixed mb-10 border-collapse">
        <thead>
        <tr>
            @foreach($columnTitles as $columnTitle)
                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">{{ $columnTitle }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($rowsValues as $rowValues)
            <tr>
                @foreach($rowValues as $rowValue)
                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{!! $rowValue !!}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
