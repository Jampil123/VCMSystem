@extends('dashboards.enforcer')

@section('content')
<section class="profile-section">
    <div class="profile-pic-container">
        <img src="/images/default-avatar.png" alt="Profile">
        <button class="change-photo-btn">+</button>
    </div>
    <h2>Jonathan Cuody</h2>
    <p>jonathancuody@mail.com</p>
</section>

<section class="info-box">
    <div class="info-item"><span>First Name</span><span>Jonathan</span></div>
    <div class="info-item"><span>Last Name</span><span>Cuody</span></div>
    <div class="info-item"><span>Enforcer ID</span><span>ENF-2025-001</span></div>
    <div class="info-item"><span>Username</span><span>jonathanc</span></div>
    <div class="info-item"><span>Email</span><span>jonathancuody@mail.com</span></div>
    <div class="info-item"><span>Role</span><span>Traffic Enforcer</span></div>
    <div class="info-item"><span>Address</span><span>Quezon City</span></div>
    <div class="info-item"><span>Gender</span><span>Male</span></div>
    <div class="info-item"><span>Birth Date</span><span>June 10, 1995</span></div>
</section>

<section class="options">
    <div class="option"><span>Edit Profile</span><i class="fa-solid fa-chevron-right"></i></div>
    <div class="option"><span>Transactions History</span><i class="fa-solid fa-chevron-right"></i></div>
    <div class="option"><span>Notification Settings</span><i class="fa-solid fa-chevron-right"></i></div>
    <div class="option"><span>Contact Us</span><i class="fa-solid fa-chevron-right"></i></div>
    <div class="option"><span>Help & FAQs</span><i class="fa-solid fa-chevron-right"></i></div>
</section>

<div class="logout">Log Out</div>


<style>
   

    
</style>
@endsection
