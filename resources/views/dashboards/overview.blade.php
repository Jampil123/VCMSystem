@extends('dashboards.enforcer')

@section('title', 'Overview')

@section('content')
<header>
    <h2>Overview</h2>
    <div class="profile"></div>
</header>

<section class="summary">
    <div class="summary-card big">
        <h4>Total Clampings</h4>
        <h2>{{ $totalClampings ?? 0 }}</h2>
        <p><i class="fa-solid fa-car-burst"></i> Updated Today</p>
    </div>

    <div class="column">
        <div class="summary-card small">
            <h4>Pending Cases</h4>
            <p>{{ $pendingCases ?? 0 }}</p>
            <i class="fa-solid fa-clock"></i>
        </div>
        <div class="summary-card small">
            <h4>Payments</h4>
            <p>₱{{ number_format($totalPayments ?? 0, 2) }}</p>
            <i class="fa-solid fa-wallet"></i>
        </div>
    </div>
</section>

<section class="filters">
    <button class="filter-btn active" data-status="all">All</button>
    <button class="filter-btn" data-status="pending">Pending</button>
    <button class="filter-btn" data-status="paid">Paid</button>
</section>

<section class="entries">
    @foreach ($clampings as $clamping)
        <div class="entry" data-status="{{ strtolower($clamping->status) }}">
            <div class="entry-left">
                @if ($clamping->status == 'paid')
                    <i class="fa-solid fa-car"></i>
                @else
                    <i class="fa-solid fa-car-burst"></i>
                @endif

                <div class="entry-info">
                    <h4>{{ $clamping->ticket_no }}</h4>
                    <p>{{ \Carbon\Carbon::parse($clamping->created_at)->diffForHumans() }} • {{ $clamping->reason ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="entry-right">
                <p>₱{{ number_format($clamping->fine_amount, 2) }}</p>
                @if ($clamping->status == 'paid')
                    <small style="color:green;">Paid</small>
                @else
                    <small style="color:#888;">Unpaid</small>
                @endif
            </div>
        </div>
    @endforeach
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/filter.js') }}"></script>
@endpush
