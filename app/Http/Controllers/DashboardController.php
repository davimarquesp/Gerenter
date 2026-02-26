<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $byMonth = Project::select(
                DB::raw("DATE_FORMAT(start_date, '%Y-%m') as ym"),
                DB::raw("COUNT(*) as total")
            )
            ->where('user_id', $userId)
            ->groupBy('ym')
            ->orderBy('ym')
            ->get();

        return view('dashboard', [
            'labels' => $byMonth->pluck('ym'),
            'data' => $byMonth->pluck('total'),
        ]);
    }
}