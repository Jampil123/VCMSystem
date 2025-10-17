<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clamping Receipt</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f6f6f6;
        }
        .receipt-container {
            width: 420px;
            background: #fff;
            border: 1px solid #ccc;
            margin: 40px auto;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            letter-spacing: 1px;
        }
        .ticket-info p {
            margin: 6px 0;
            font-size: 14px;
        }
        .label {
            font-weight: bold;
            color: #333;
        }
        .photo {
            text-align: center;
            margin-top: 15px;
        }
        .photo img {
            width: 100%;
            max-width: 320px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .qr-code {
            text-align: center;
            margin-top: 25px;
        }
        .qr-code p {
            font-size: 12px;
            color: #555;
            margin-top: 8px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #555;
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        @media print {
            body {
                background: #fff;
            }
            .receipt-container {
                box-shadow: none;
                border: none;
                margin: 0;
                width: 100%;
            }
            .print-btn {
                display: none;
            }
        }
        .print-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 25px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }
        .print-btn:hover {
            background-color: #0056b3;
        }
    </style>
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
