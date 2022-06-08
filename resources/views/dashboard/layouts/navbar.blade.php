<div class="sticky-top">
    <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
        <div class="container-xl">
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-menu"
            >
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1
        class="navbar-brand d-none-navbar-horizontal pe-0 pe-md-3"
        >
        <a href="/dashboard">
            <img
            src="{{ asset('static/logopolindra.png') }}"
            width="110"
            height="32"
            alt="UKM POLINDRA"
            class="navbar-brand-image"/>
        </a>
        Manajemen UKM POLINDRA
    </h1>
    <div class="navbar-nav flex-row order-md-last">
        <div class="nav-item d-none d-md-flex me-3">
            <div class="btn-list">
                <a
                href="/{{ config('chatify.routes.prefix') }}"
                class="btn"
                target="_blank"
                rel="noreferrer"
                >
                <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"></path>
                    <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"></path>
                </svg>
                Message
            </a>

        </div>
    </div>
    <div class="d-none d-md-flex">
        <a
        href="?theme=dark"
        class="nav-link px-0 hide-theme-dark"
        title="Mode Gelap"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
        >
        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
        <svg
        xmlns="http://www.w3.org/2000/svg"
        class="icon"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        stroke-width="2"
        stroke="currentColor"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
        >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
        d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"
        />
    </svg>
</a>
<a
href="?theme=light"
class="nav-link px-0 hide-theme-light"
title="Mode Terang"
data-bs-toggle="tooltip"
data-bs-placement="bottom"
>
<!-- Download SVG icon from http://tabler-icons.io/i/sun -->
<svg
xmlns="http://www.w3.org/2000/svg"
class="icon"
width="24"
height="24"
viewBox="0 0 24 24"
stroke-width="2"
stroke="currentColor"
fill="none"
stroke-linecap="round"
stroke-linejoin="round"
>
<path stroke="none" d="M0 0h24v24H0z" fill="none" />
<circle cx="12" cy="12" r="4" />
<path
d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"
/>
</svg>
</a>
<div class="nav-item dropdown d-none d-md-flex me-3">
    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
        <span class="badge bg-red"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Last updates</h3>
            </div>
            <div class="list-group list-group-flush list-group-hoverable">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                        <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 1</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                                Change deprecated html tags to text decoration classes (#29604)
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot d-block"></span></div>
                        <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 2</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                                justify-content:between ⇒ justify-content:space-between (#29734)
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="list-group-item-actions show">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot d-block"></span></div>
                        <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 3</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                                Update change-version.js (#29736)
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                        <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 4</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                                Regenerate package-lock.json (#29730)
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="nav-item dropdown">
    <a
    href="#"
    class="nav-link d-flex lh-1 text-reset p-0"
    data-bs-toggle="dropdown"
    aria-label="Open user menu"
    >
    <span
    class="avatar avatar-sm"
    style="
    background-image: url({{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('img/noprofil.png') }});
    "
    ></span>
    <div class="d-none d-xl-block ps-2">
        <div>{{ Auth::user()->name }}</div>
        <div class="mt-1 small text-muted">{{ Auth::user()->email }}</div>
    </div>
</a>
<div
class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
>
<a href="{{ route('/') }}" class="dropdown-item">Homepage</a>
<a href="{{ route('profile') }}" class="{{ Request::is('profile') ? 'active' : '' }} dropdown-item">Profile & Account</a>
<a href="{{ route('log-activity') }}" class="{{ Request::is('log-activity') ? 'active' : '' }} dropdown-item">Log Aktivitas</a>
<div class="dropdown-divider"></div>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="dropdown-item" href="#">
        Log Out
    </button>
</form>
</div>
</div>
</div>
</div>
</header>

{{-- Sidebar START --}}
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('dashboard') || Request::is('ukm') || Request::is('dashboard/showKegiatan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="icon"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                            <path
                            stroke="none"
                            d="M0 0h24v24H0z"
                            fill="none"
                            />
                            <polyline
                            points="5 12 3 12 12 3 21 12 19 12"
                            />
                            <path
                            d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"
                            />
                            <path
                            d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"
                            />
                        </svg>
                    </span>
                    <span class="nav-link-title"> Dashboard </span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('kegiatan') || Request::is('act-detailKegiatan') || Request::is('act-komentar')? 'active' :'' }}">
                <a class="nav-link" href="{{ route('kegiatan.index') }}">
                    <span
                    class="nav-link-icon d-md-none d-lg-inline-block"
                    ><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-activity" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 12h4l3 8l4 -16l3 8h4"></path>
                    </svg>
                </span>
                <span class="nav-link-title">
                    Kegiatan
                </span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('proposal') || Request::is('ac-detailProposal') || Request::is('ac-komentar') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('proposal') }}">
                <span
                class="nav-link-icon d-md-none d-lg-inline-block"
                ><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-license" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path>
                    <line x1="9" y1="7" x2="13" y2="7"></line>
                    <line x1="9" y1="11" x2="13" y2="11"></line>
                </svg>
            </span>
            <span class="nav-link-title"> Manajaemen Proposal </span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('log-book') || Request::is('lg-detailLogbook') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('logbook') }}">
            <span
            class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                <line x1="3" y1="6" x2="3" y2="19"></line>
                <line x1="12" y1="6" x2="12" y2="19"></line>
                <line x1="21" y1="6" x2="21" y2="19"></line>
            </svg>
        </span>
        <span class="nav-link-title"> Logbook Kegiatan </span>
    </a>
</li>
<li class="nav-item {{ Request::is('laporan') || Request::is('lp-detailLaporan')? 'active' : '' }}">
    <a class="nav-link" href="{{ route('laporan') }}">
        <span
        class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
            <path d="M18 14v4h4"></path>
            <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
            <rect x="8" y="3" width="6" height="4" rx="2"></rect>
            <circle cx="18" cy="18" r="4"></circle>
            <path d="M8 11h4"></path>
            <path d="M8 15h3"></path>
        </svg>
    </span>
    <span class="nav-link-title"> Rekap Laporan </span>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
{{-- Sidebar END --}}
</div>
