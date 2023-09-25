<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\View\View;

class LogController extends Controller
{
    public function index(): View
    {
        $rowsValues = [];
        $logs = Log::with('user')->paginate(10);
        $columnTitles = ['Type', 'User', 'IP', 'Details', 'Date'];
        foreach($logs as $log) {
            $rowsValues[] = [
                $log->log_type,
                $log->user?->id ?
                    "<a href=\"" . route('user.view', $log->user->username) . "\" target=\"_blank\">" . $log->user->username . "</a>":
                    "Unknown",
                $log->ip_address,
                $log->details,
                $log->created_at_formatted()
            ];
        }
        return view('admin.logs.index', [
            'logs' => $logs,
            'columnTitles' => $columnTitles,
            'rowsValues' => $rowsValues
        ]);
    }
}
