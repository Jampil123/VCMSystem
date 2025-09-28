<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Clamping;
use Illuminate\Http\Request;

class ClampingController extends Controller
{
    public function index()
    {
        $clampings = Clamping::orderBy('created_at', 'desc')->get();
        return view('clamping', compact('clampings')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plate_no' => 'required|string|max:20',
            'vehicle_type'  => 'required|string|max:50',
            'reason'        => 'required|string|max:255',
            'location'      => 'required|string|max:255',
            'photo'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'fine_amount'   => 'required|numeric|min:0',
        ]);

        $lastClamping = Clamping::orderBy('id', 'desc')->first();
        $nextNumber = $lastClamping ? $lastClamping->id + 1 : 1;

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('clamping_photos', 'public');
        }

        $clamping = Clamping::create([
            'ticket_no'    => 'TKT-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT),
            'plate_no'      => $validated['plate_no'],
            'vehicle_type'  => $validated['vehicle_type'],
            'reason'        => $validated['reason'],
            'location'      => $validated['location'],
            'date_clamped'  => now(),
            'status'        => 'Pending',
            'photo'         => $photoPath,
            'fine_amount'   => $validated['fine_amount'],
        ]);

        $clamping->save();

        return response()->json([
            'success' => true,
            'message' => 'Clamping updated successfully',
            'data'    => $clamping,
        ]);
    }
    
    public function show($id)
    {
        return response()->json(Clamping::findOrFail($id));
    }
}
