<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Verification - VCMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset & Background */
        body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: url('{{ asset('images/bg.jpg') }}') no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* allow top alignment */
    min-height: 100vh;
    overflow-y: auto; /* enable vertical scroll */
}


        /* Glass Container */
        .ticket-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 25px;
            padding: 25px 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
            color: #fff;
            text-align: center;
            margin: 20px;
            transition: all 0.3s ease;
        }

        /* Header Section */
        .ticket-header {
            margin-bottom: 20px;
        }

        .ticket-header h2 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 0.5px;
            color: #000000ff;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .ticket-header small {
            font-size: 13px;
            opacity: 0.9;
            color: #000000ff;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        /* Ticket Details */
        .ticket-info {
            text-align: left;
            background: rgba(255, 255, 255, 0.1);
            padding: 15px 18px;
            border-radius: 15px;
            margin-top: 10px;
        }

        .ticket-info p {
            margin: 6px 0;
            font-size: 14px;
            color: #f0f0f0;
        }

        .label {
            font-weight: 600;
            color: #fff;
        }

        /* Vehicle Photo */
        .photo {
            text-align: center;
            margin: 20px 0;
        }

        .photo img {
            width: 100%;
            max-width: 300px;
            border-radius: 12px;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        /* Status Styles */
        .status {
            margin-top: 15px;
            font-weight: bold;
            padding: 12px;
            border-radius: 12px;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .status.paid {
            background: rgba(40, 167, 69, 0.2);
            color: #b4f5b4;
            border: 1px solid rgba(40, 167, 69, 0.5);
        }

        .status.unpaid {
            background: rgba(220, 53, 69, 0.2);
            color: #ffb4b4;
            border: 1px solid rgba(220, 53, 69, 0.5);
        }

        /* Enforcer Info */
        .enforcer {
            margin-top: 15px;
            font-size: 13px;
            opacity: 0.9;
        }

        /* Pay Button */
        .pay-btn {
            display: inline-block;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #fff;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 15px;
            margin-top: 20px;
            font-weight: 500;
            transition: 0.3s;
        }

        .pay-btn:hover {
            background: linear-gradient(135deg, #0096ff, #0048ff);
            transform: scale(1.05);
        }

        /* Footer */
        .ticket-footer {
            margin-top: 25px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.85);
        }

        /* Responsive */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .ticket-card {
                border-radius: 18px;
                padding: 20px;
            }

            .ticket-info {
                font-size: 13px;
            }
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
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
            <a href="#" class="pay-btn">💳 Pay Online</a>
        @endif

        <div class="ticket-footer">
            <p>© {{ date('Y') }} City Traffic Department — All Rights Reserved</p>
        </div>
    </div>
</body>
</html>
