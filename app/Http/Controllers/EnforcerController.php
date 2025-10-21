<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clamping;
use App\Models\Payee;

class EnforcerController extends Controller
{
    public function index()
    {
        
        $totalClampings = Clamping::count();
        $pendingCases = Clamping::where('status', 'pending')->count();
        $totalPayments = Payee::sum('amount_paid');

        $clampings = Clamping::orderBy('created_at', 'desc')->get();

        return view('dashboards.overview', compact('totalClampings', 'pendingCases', 'totalPayments', 'clampings'));
    }

    public function getSummary()
    {
        return response()->json([
            'totalClampings' => Clamping::count(),
            'pendingCases' => Clamping::where('status', 'pending')->count(),
            'totalPayments' => Payee::sum('amount_paid'),
        ]);
    }

    public function profile()
    {
        return view('dashboards.profile');
    }


}
