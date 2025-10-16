<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enforcer Dashboard</title>

    <link rel="stylesheet" href="/../../styles/enforcer-dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <header>
        <h2>Overview</h2>
        <div class="profile"></div>
    </header>
    <section class="summary">
        <div class="summary-card big">
            <h4>Total Clampings</h4>
            <h2>25</h2>
            <p><i class="fa-solid fa-car-burst"></i> Updated Today</p>
        </div>

        <div class="column">
            <div class="summary-card small">
                <h4>Pending Cases</h4>
                <p>6</p>
                <i class="fa-solid fa-clock"></i>
            </div>
            <div class="summary-card small">
                <h4>Payments</h4>
                <p>₱3,480</p>
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
        <div class="entry">
            <div class="entry-left">
                <i class="fa-solid fa-car-burst"></i>
                <div class="entry-info">
                <h4>Clamping #102</h4>
                <p>Today • Illegal Parking</p>
                </div>
            </div>
            <div class="entry-right">
                <p>₱500</p>
                <small style="color:#888;">Unpaid</small>
            </div>
            </div>

            <div class="entry">
            <div class="entry-left">
                <i class="fa-solid fa-car"></i>
                <div class="entry-info">
                <h4>Clamping #101</h4>
                <p>Yesterday • Expired Permit</p>
                </div>
            </div>
            <div class="entry-right">
                <p>₱350</p>
                <small style="color:green;">Paid</small>
            </div>
        </div>
    </section>

    <nav>
        <button class="active"><i class="fa-solid fa-house"></i></button>
        <button><i class="fa-solid fa-bell"></i></button>
        <button class="add" id="addClampingBtn"><i class="fa-solid fa-plus"></i></button>
        <button><i class="fa-solid fa-list"></i></button>
        <button><i class="fa-solid fa-user"></i></button>
    </nav>

    <script>
        document.getElementById('addClampingBtn').addEventListener('click', function() {
        window.location.href = "{{ route('add.clamping') }}";
        });
    </script>

    <script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        });
    });
    </script>
</body>
</html>
