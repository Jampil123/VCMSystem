<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Verification - VCMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../../styles/portal.css">
</head>
<body>
    <div class="ticket-card">
        <div class="ticket-header">
            <h2>VCMS Ticket Verification</h2>
            <small>Vehicle Clamping Management System</small>
        </div>

        <div class="ticket-info">
            <p><span class="label">Ticket No:</span> {{ $clamping->ticket_no }}</p>
            <p><span class="label">Plate No:</span> {{ $clamping->plate_no }}</p>
            <p><span class="label">Vehicle Type:</span> {{ $clamping->vehicle_type }}</p>
            <p><span class="label">Reason:</span> {{ $clamping->reason }}</p>
            <p><span class="label">Fine Amount:</span> ₱{{ number_format($clamping->fine_amount, 2) }}</p>
            <p><span class="label">Date Issued:</span> {{ $clamping->created_at->format('M d, Y h:i A') }}</p>
        </div>

        @if($clamping->photo)
        <div class="photo">
            <img src="{{ asset('storage/' . $clamping->photo) }}" alt="Vehicle Photo">
        </div>
        @endif

        <div class="status {{ strtolower($clamping->status) }}">
            {{ strtoupper($clamping->status) }}
        </div>

        <div class="enforcer">
            <p>Issued by: <strong>{{ $clamping->enforcer_name ?? 'Traffic Enforcer' }}</strong></p>
        </div>

        @if(strtolower($clamping->status) !== 'paid')
            <a href="#" class="pay-btn">Pay Online</a>
        @endif

        <div class="ticket-footer">
            <p>© {{ date('Y') }} City Traffic Department — All Rights Reserved</p>
        </div>
    </div>
</body>
</html>
