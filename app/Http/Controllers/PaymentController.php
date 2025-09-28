<?php

namespace App\Http\Controllers;

use App\Models\Payee;
use App\Models\Clamping;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PaymentController extends Controller
{   
     public function index()
    {
        $payments = Payee::with('clamping')->get();
        return view('payment', compact('payments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ticket_no'      => 'required|exists:clampings,ticket_no',
            'name'           => 'required|string|max:255',
            'payment_method' => 'required|in:walk-in,online',
            'amount_paid'    => 'required|numeric|min:0',
        ]);

        $clamping = Clamping::where('ticket_no', $validated['ticket_no'])->first();

        if ($clamping->status === 'paid') {
            return response()->json([
                'success' => false,
                'message' => 'This ticket has already been paid.'
            ], 400); // 400 Bad Request
        }

        $payee = Payee::create($validated);

        $clamping->update(['status' => 'paid']);

        return response()->json([
            'success' => true,
            'message' => 'Payment recorded successfully.',
            'data'    => $payee,
        ], 201);
    }


}
