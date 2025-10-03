@extends('layouts.app')

@section('title', 'Clamping Dashboard')

@section('content')

<div class="payments-container">
    <div class="summary-cards">
        <div class="card">
            <h4>Total Collected Today</h4>
            <p>₱{{ number_format($totalCollected, 2) }}</p>
        </div>
        <div class="card">
            <h4>Unpaid Violations</h4>
            <p>{{ $unpaidViolations }}</p>
        </div>
        <div class="card">
            <h4>Total Tickets Issued Today</h4>
            <p>{{ $ticketsToday }}</p>
        </div>
    </div>

    <div class="filters">
        <input type="text" placeholder="Search by Plate No. / Ticket ID">
        <select>
            <option>All Status</option>
            <option>Paid</option>
            <option>Unpaid</option>
            <option>Pending</option>
        </select>
        <input type="date">
        <input type="date">
        <button>Filter</button>
    </div>
    
    <div class="payment_table_wrapper">
        <table class="payments-table">
            <thead>
                <tr>
                    <th>Ticket No.</th>
                    <th>Plate No.</th>
                    <th>Violation</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date Paid</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                <tr>
                    <td>{{ $payment->ticket_no }}</td>
                    <td>{{ $payment->clamping->plate_no ?? '—' }}</td>
                    <td>{{ $payment->clamping->reason ?? '—' }}</td>
                    <td>{{ ucfirst($payment->payment_method) }}</td>
                    <td>₱{{ number_format($payment->amount_paid, 2) }}</td>
                    <td class="paid">Paid</td>
                    <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('m/d/Y') }}</td>
                    <td>
                        <button>View Receipt</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center;">No payments found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ✅ Walk-in Payment Form -->
    <form id="walkinPaymentForm" action="{{ route('payments') }}" method="POST" class="walkin-form">
        @csrf

        <h3>Walk-In Payment</h3>

        <div class="form-grid">

            <div class="form-group">
                <label for="ticket_no">Ticket No.</label>
                <input type="text" id="ticket_no" name="ticket_no" placeholder="Enter Ticket Number" required>
            </div>

            <div class="form-group">
                <label for="name">Payee Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Payee Name" required>
            </div>

            <div class="form-group">
                <label for="amount_paid">Amount</label>
                <input type="number" id="amount_paid" name="amount_paid" placeholder="Enter Amount" required>
            </div>

            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="">--Select Method--</option>
                    <option value="walk-in">Walk-in (Cash)</option>
                    <option value="online">Online</option>
                </select>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>

    <div id="paymentOverlay" class="overlay hidden">
        <div class="overlay-card">
            <div id="paymentSpinner" class="spinner"></div>
            <div id="paymentMessage" class="message">Saving...</div>
            <div id="paymentSub" class="sub"></div>
        </div>
    </div>

</div>

@endsection
