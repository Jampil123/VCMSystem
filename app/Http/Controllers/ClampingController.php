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
        return view('clamping', compact('clampings')); // <-- plural view name if you renamed it
    }

    public function store(Request $request)
    {
        // validate
        $validated = $request->validate([
            'plate_no' => 'required|string|max:20',
            'vehicle_type'  => 'required|string|max:50',
            'reason'        => 'required|string|max:255',
            'location'      => 'required|string|max:255',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // handle file upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('clamping_photos', 'public');
        }

        // save record
        $clamping = Clamping::create([
            'ticket_no'     => 'TKT-' . strtoupper(Str::random(6)),
            'plate_no'      => $validated['plate_no'],
            'vehicle_type'  => $validated['vehicle_type'],
            'reason'        => $validated['reason'],
            'location'      => $validated['location'],
            'date_clamped'  => now(),
            'status'        => 'Pending',
            'photo'         => $photoPath,
        ]);

        $clamping->save();

        return response()->json([
            'success' => true,
            'message' => 'Clamping updated successfully',
            'data'    => $clamping,
        ]);
    }
    
    

    // Show single clamping
    public function show($id)
    {
        return response()->json(Clamping::findOrFail($id));
    }
}
