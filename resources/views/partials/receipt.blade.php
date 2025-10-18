<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clamping Receipt</title>
    <link rel="stylesheet" href="/../../styles/receipt.css">
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <h2>Vehicle Clamping Receipt</h2>
            <p><small>Violation Clamping Management System</small></p>
        </div>

        <div class="ticket-info">
            <p><span class="label">Ticket No:</span> {{ $clamping->ticket_no }}</p>
            <p><span class="label">Plate No:</span> {{ $clamping->plate_no }}</p>
            <p><span class="label">Vehicle Type:</span> {{ $clamping->vehicle_type }}</p>
            <p><span class="label">Reason:</span> {{ $clamping->reason }}</p>
            <p><span class="label">Location:</span> {{ $clamping->location }}</p>
            <p><span class="label">Fine Amount:</span> ₱{{ number_format($clamping->fine_amount, 2) }}</p>
            <p><span class="label">Date Issued:</span> {{ $clamping->created_at->format('M d, Y h:i A') }}</p>
            <p><span class="label">Status:</span> {{ $clamping->status }}</p>
        </div>

        <!-- @if($clamping->photo)
            <div class="photo">
                <img src="{{ asset('storage/' . $clamping->photo) }}" alt="Vehicle Photo">
            </div>
        @endif -->

       {{-- QR Code Section --}}
        <div class="qr-code">
            {!! $qrCode !!}
            <p>Scan to verify this ticket online</p>
        </div>

        <div class="footer">
            <p>Authorized by: <strong>Traffic Enforcer</strong></p>
            <p>Thank you for your cooperation.</p>
            <p>© {{ date('Y') }} VCMS — City Traffic Department</p>
        </div>
    </div>

    <button class="print-btn" onclick="window.print()">🖨 Print Receipt</button>
</body>
</html>
