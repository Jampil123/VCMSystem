<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        $totalClamped = DB::table('clampings')->count();

        $activeViolations = DB::table('clampings')
            ->leftJoin('payees', 'clampings.ticket_no', '=', 'payees.ticket_no')
            ->whereNull('payees.id')
            ->count();

        $totalFines = DB::table('payees')->sum('amount_paid');

        $violationsPerDay = DB::table('clampings')
            ->leftJoin('payees', 'clampings.ticket_no', '=', 'payees.ticket_no')
            ->whereNull('payees.id')
            ->select(DB::raw('DATE(clampings.date_clamped) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

       $enforcers = User::whereHas('role', function ($q) {
                $q->where('name', 'Enforcer');
            })
            ->with('status') // eager-load status relation
            ->select('id','f_name','l_name','email','enforcer_id','status_id')
            ->get();

        return view('dashboard', compact('totalClamped', 'activeViolations', 'totalFines', 'violationsPerDay', 'enforcers'));
    }
}
