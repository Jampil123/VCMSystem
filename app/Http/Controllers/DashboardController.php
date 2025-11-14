<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

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
