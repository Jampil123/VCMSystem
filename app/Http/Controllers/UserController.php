<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['role', 'status', 'details'])->get();

        $totalUsers = $users->count();
        $activeUsers = $users->where('status.status', 'Approved')->count();
        $pendingUsers = $users->where('status.status', 'Pending')->count();
        $inactiveUsers = $users->where('status.status', 'Suspended')->count();

        return view('users', compact('users', 'totalUsers', 'activeUsers', 'pendingUsers', 'inactiveUsers'));

    }   
}
