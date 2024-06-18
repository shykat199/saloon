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

        $data['totalDue'] = VisitorService::selectRaw('SUM(due_amt) as total')->first();
        $data['totalPaid'] = VisitorService::selectRaw('SUM(paid_amt) as total')->first();
        $data['labels'] = $salesData->pluck('month')->toArray();
        $data['data'] = $salesData->pluck('total')->toArray();

        return view('admin.dashboard.dashboard',$data);
    }
}
