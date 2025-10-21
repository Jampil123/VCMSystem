document.addEventListener('DOMContentLoaded', () => {
    const backBtn = document.getElementById('backBtn');
    if (backBtn) {
        backBtn.addEventListener('click', () => {
            window.location.href = '/enforcer/dashboard';
        });
    }

    
});

document.addEventListener("DOMContentLoaded", () => {
    const homeBtn = document.getElementById("homeBtn");
    const notificationsBtn = document.getElementById("notificationsBtn");
    const addClampingBtn = document.getElementById("addClampingBtn");
    const recordsBtn = document.getElementById("recordsBtn");
    const profileBtn = document.getElementById("profileBtn");
    const backBtn = document.getElementById('backBtn');
    const buttons = document.querySelectorAll("nav button");

    // Highlight active button
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            buttons.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");
        });
    });

    // Navigation actions
    homeBtn.addEventListener("click", () => {
        window.location.href = "/enforcer/dashboard";
    });

    notificationsBtn.addEventListener("click", () => {
        window.location.href = "/notifications";
    });

    addClampingBtn.addEventListener("click", () => {
        window.location.href = "/add-clamping";
    });

    // backBtn.addEventListener('click', () => {
    //     window.location.href = '/enforcer';
    // });

    recordsBtn.addEventListener("click", () => {
        window.location.href = "/records";
    });

    profileBtn.addEventListener("click", () => {
        window.location.href = "/enforcer/profile";
    });
});


    // document.querySelectorAll('.filter-btn').forEach(button => {
    //     button.addEventListener('click', () => {
    //     document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
    //     button.classList.add('active');
    //     });
    // });
  
    // setInterval(() => {
    //     fetch('/enforcer/summary')
    //         .then(response => response.json())
    //         .then(data => {
    //         document.querySelector('.summary-card.big h2').textContent = data.totalClampings;
    //         document.querySelector('.summary-card.small:nth-child(1) p').textContent = data.pendingCases;
    //         document.querySelector('.summary-card.small:nth-child(2) p').textContent = 
    //             '₱' + parseFloat(data.totalPayments).toLocaleString('en-PH', { minimumFractionDigits: 2 });
    //         });
    //     }, 5000); // refresh every 5 seconds
   

