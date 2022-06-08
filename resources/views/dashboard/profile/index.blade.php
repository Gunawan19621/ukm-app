@extends('dashboard.layouts.main')
@section('container')
<div class="col-6 col-md-4 mx-auto my-auto">
    <div class="card">
      <div class="card-body text-center">
        <div class="mb-3">
          <span class="avatar avatar-xl avatar-rounded" style="background-image: url({{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : 'img/noprofil.png' }})"></span>
        </div>
        <div class="card-title mb-1">{{ Auth::user()->name }}</div>
        <div class="text-muted">{{ Auth::user()->email }}</div>
        <div class="mt-3">
            @if(Auth::user()->role == 1)
            <span class="badge bg-purple-lt">Kemahasiswaan</span>
            @elseif(Auth::user()->role == 2)
            <span class="badge bg-green-lt">BAAK</span>
            @elseif(Auth::user()->role == 3)
            <span class="text-muted">UKM</span>
            @endif
          </div>
      </div>
      <div class="d-flex">
        <a target="_blank" href="https://mail.google.com/mail/{{ Auth::user()->email }}" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
          Email</a>
        <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
          Call</a>
      </div>
      <a href="#" class="card-btn">Lihat profil selengkapnya</a>
    </div>
  </div>
@endsection
