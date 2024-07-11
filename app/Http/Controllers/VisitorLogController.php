<?php

namespace App\Http\Controllers;

use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorLogController extends Controller
{
    public function index()
    {
        $visitorLogs = VisitorLog::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('HOUR(created_at) as hour'),
            DB::raw('count(*) as count')
        )
            ->groupBy('date', 'hour')
            ->orderBy('date', 'desc')
            ->orderBy('hour', 'desc')
            ->get();

        return view('visitors', compact('visitorLogs'));
    }
}
