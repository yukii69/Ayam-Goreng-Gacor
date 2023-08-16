@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row align-items-center vh-100">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h2 style="display: inline-block; white-space: nowrap; ">Hello, {{ Auth::user()->name }}! Selamat datang di Dashboard Website Ayam Goreng Gacor</h2>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="main-skills">
    <div class="card1">
        <i class="fas fa-user"></i>
            <h3>User</h3>
            <p>Terakhir di Update: {{ $user->last()->updated_at }}</p>
            <button>Jumlah data: {{ count($user) }}</button>
    </div>

    <div class="card1">
        <i class="fas fa-tags"></i>
            <h3>Banner</h3>
            <p>Terakhir di Update: {{ $banner->last()->updated_at }}</p>
            <button>Jumlah data: {{ count($banner) }}</button>
    </div>
    
    <div class="card1">
        <i class="fas fa-bolt"></i>
            <h3>Andalan</h3>
            <p>Terakhir di Update: {{ $andalan->last()->updated_at }}</p>
            <button>Jumlah data: {{ count($andalan) }}</button>
    </div>
    
    <div class="card1">
        <i class="fas fa-utensils"></i>
            <h3>Menu</h3>
            <p>Terakhir di Update: {{ $menu->last()->updated_at }}</p>
            <button>Jumlah data: {{ count($menu) }}</button>
    </div>
    
    <div class="card1">
        <i class="fas fa-percent"></i>
            <h3>Promo</h3>
            <p>Terakhir di Update: {{ $promo->last()->updated_at }}</p>
            <button>Jumlah data: {{ count($promo) }}</button>
    </div>
    
    <div class="card1">
        <i class="fas fa-percent"></i>
            <h3>Galery</h3>
            <p>Terakhir di Update: {{ $galery->last()->updated_at }}</p>
            <button>Jumlah data: {{ count($galery) }}</button>
    </div>

    <div class="card1">
        <i class="fas fa-comment"></i>
            <h3>Testimonials</h3>
            <p>Terakhir di Update: {{ $testi->last()->updated_at }}</p>
            <button>Jumlah data: {{ count($testi) }}</button>
    </div>
    
    <div class="card1">
        <i class="fas fa-phone"></i>
            <h3>Whatsapp</h3>
            <p>Terakhir di Update: {{ $wa->last()->updated_at }} </p>
            <button>Jumlah data: {{ count($wa) }}</button>
    </div>
</div>

@endsection