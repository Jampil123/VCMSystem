<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function dashboard()
    {
        // Optional: you can fetch data here later
        // Example placeholders:
        $totalCollected = 0;
        $unpaidViolations = 0;

        return view('dashboard', compact('totalCollected', 'unpaidViolations'));
    }
}
