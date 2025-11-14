<div class="receipt-root">
    <style>
        /* Scoped styles for receipt inside modal */
        .receipt-root { font-family: Arial, Helvetica, sans-serif; color: #111; }
        .receipt-card { max-width: 700px; margin: 0 auto; padding: 18px; border: 1px solid #e5e7eb; border-radius: 6px; background: #fff; }
        .receipt-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; }
        .receipt-title { font-size:18px; font-weight:700; }
        .receipt-meta { font-size:12px; color:#6b7280; }
        .receipt-body { margin-top:12px; }
        .receipt-row { display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px dashed #f3f4f6; }
        .receipt-total { font-weight:700; font-size:16px; text-align:right; margin-top:10px; }
        /* Print styles */
        @media print {
            body * { visibility: hidden; }
            .receipt-root, .receipt-root * { visibility: visible; }
            .receipt-root { position: absolute; left: 0; top: 0; width: 100%; }
        }
    </style>

    <div class="receipt-card">
        <div class="receipt-header">
            <div>
                <div class="receipt-title">Clamping Receipt</div>
                <div class="receipt-meta">Ticket No: {{ $clamping->ticket_no }}</div>
            </div>
            <div class="receipt-meta">{{ \\Carbon\\Carbon::parse($clamping->date_clamped)->format('m/d/Y H:i') }}</div>
        </div>

        <div class="receipt-body">
            <div class="receipt-row"><div>Plate No.</div><div>{{ $clamping->plate_no }}</div></div>
            <div class="receipt-row"><div>Reason</div><div>{{ $clamping->reason }}</div></div>
            <div class="receipt-row"><div>Location</div><div>{{ $clamping->location }}</div></div>
            <div class="receipt-row"><div>Fine Amount</div><div>₱{{ number_format($clamping->fine_amount,2) }}</div></div>
            <div class="receipt-row"><div>Enforcer</div><div>{{ optional($clamping->enforcer)->full_name ?? ($clamping->enforcer_id ?? '-') }}</div></div>

            <div class="receipt-total">Total: ₱{{ number_format($clamping->fine_amount,2) }}</div>
        </div>

        @if(isset($qrCode))
            <div style="margin-top:12px; text-align:center">{!! $qrCode !!}</div>
        @endif
    </div>
</div>
