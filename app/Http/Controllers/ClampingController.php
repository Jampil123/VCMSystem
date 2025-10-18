<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Clamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ClampingController extends Controller
{   
    public function create()
    {
        return view('dashboards.enforcer-add-clamping');
    }
    public function index()
    {
        $clampings = Clamping::orderBy('created_at', 'desc')->get();
        return view('clamping', compact('clampings')); 
    }

    public function store(Request $request)
    {
        Log::info('Photo from request:', [$request->file('photo')]);

        $validated = $request->validate([
            'plate_no' => 'required|string|max:20',
            'vehicle_type'  => 'required|string|max:50',
            'reason'        => 'required|string|max:255',
            'location'      => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
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
            'id' => $clamping->id,
        ]);
    }

    public function print($id)
    {   
        $clamping = Clamping::findOrFail($id);
        $qrCode = QrCode::size(120)->generate(url('/verify/' . $clamping->id));

        return view('partials.receipt', compact('clamping', 'qrCode'));
    }

    public function verify($id)
    {
        $clamping = Clamping::find($id);

        if (!$clamping) {
            return view('verify.notfound');
        }

        return view('verify.portal', compact('clamping'));
    }
    
    public function show($id)
    {
        return response()->json(Clamping::findOrFail($id));
    }
}
