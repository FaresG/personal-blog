<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('show-admin-dashboard', $request->user())) {
            abort(403);
        }
        return view('admin.dashboard.index');
    }
}
