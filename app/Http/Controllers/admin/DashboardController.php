<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\VisitorService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $salesData = VisitorService::selectRaw('SUM(total_amt) as total, MONTHNAME(created_at) as month')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderByRaw('MIN(created_at)')
            ->get();

        $labels = $salesData->pluck('month')->toArray();
        $data = $salesData->pluck('total')->toArray();

        return view('admin.dashboard.dashboard',compact('labels', 'data'));
    }
}
