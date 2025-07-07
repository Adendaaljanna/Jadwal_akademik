<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penjadwalan Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        background:rgb(139, 199, 139); /* hijau background */
        font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
    }
    .sidebar-custom {
        background: linear-gradient(135deg,rgb(16, 19, 17) 0%,rgb(50, 107, 50) 100%); /* Hijau gradient */
        color: #fff;
        min-height: 100vh;
        box-shadow: 2px 0 8px rgba(22, 18, 18, 0.05);
        transition: left 0.3s;
    }
    .sidebar-custom .nav-link {
        color:rgb(58, 129, 82);
        font-weight: 500;
        border-radius: 8px;
        margin-bottom: 4px;
        transition: background 0.2s, color 0.2s;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sidebar-custom .nav-link.active,
    .sidebar-custom .nav-link:hover {
        background: #DFFFE2;
        color:rgb(4, 5, 5); /* Hijau utama */
    }
    .sidebar-custom h4 {
        font-weight: bold;
        letter-spacing: 1px;
    }
    .sidebar-logo img {
        background: #DFFFE2;
    }
    .main-header {
        background: rgba(44, 145, 94, 0.85); /* transparan Hijau */
        border-radius: 16px;
        box-shadow: 0 2px 16px rgba(4, 116, 63, 0.08); /* bayangan Hijau */
        padding: 24px 32px 16px 32px;
        margin-bottom: 32px;
        position: sticky;
        top: 0;
        z-index: 10;
        backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .main-header .user-info .fa-user-circle {
        color:rgb(49, 145, 62);
    }
    .card-custom {
        border-radius: 20px;
        box-shadow: 0 4px 24px rgba(11, 187, 120, 0.1);
        border: none;
        margin-bottom: 24px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card-custom:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 8px 32px rgba(236, 72, 153, 0.15);
    }
    .btn-primary, .btn-danger {
        border-radius: 8px;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(35, 141, 109, 0.08);
        background-color:rgb(2, 78, 47);
        border-color:rgb(52, 141, 74);
    }
    .btn-primary:hover, .btn-danger:hover {
        background-color:rgb(6, 219, 120);
        border-color:rgb(41, 212, 18);
        opacity: 0.9;
    }
    .badge.bg-primary {
        background-color:rgb(6, 10, 8) !important;
    }

    /* Responsive sidebar */
    @media (max-width: 991px) {
        .sidebar-custom {
            position: fixed;
            left: -240px;
            top: 0;
            width: 220px;
            height: 100vh;
            z-index: 1050;
        }
        .sidebar-custom.show {
            left: 0;
        }
        .sidebar-backdrop {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(7, 2, 2, 0.2);
            z-index: 1049;
        }
        .sidebar-backdrop.show {
            display: block;
        }
    }
    .sidebar-toggle {
        display: none;
        background: none;
        border: none;
        font-size: 1.8rem;
        color:rgb(30, 148, 89);
        margin-right: 16px;
    }
    @media (max-width: 991px) {
        .sidebar-toggle {
            display: inline-block;
        }
    }
</style>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar-custom').classList.toggle('show');
            document.querySelector('.sidebar-backdrop').classList.toggle('show');
        }
        function closeSidebar() {
            document.querySelector('.sidebar-custom').classList.remove('show');
            document.querySelector('.sidebar-backdrop').classList.remove('show');
        }
    </script>
</head>
<body>
    @php
        $hideSidebar = in_array(request()->route()->getName(), ['login', 'register']);
    @endphp
    <div class="d-flex">
        @if(Auth::check() && !$hideSidebar)
        <div class="sidebar-backdrop" onclick="closeSidebar()"></div>
        <nav class="sidebar-custom p-3">
            <div class="sidebar-logo">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=2563eb&color=fff" alt="Logo">
                <span class="fw-bold fs-5">SIAKAD</span>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class="nav-item"><a href="/jadwal" class="nav-link {{ request()->is('jadwal') ? 'active' : '' }}"><i class="fa-solid fa-calendar-days"></i> Jadwal</a></li>
                <li class="nav-item"><a href="/event" class="nav-link {{ request()->is('event') ? 'active' : '' }}"><i class="fa-solid fa-bolt"></i> Event</a></li>
                <li class="nav-item"><a href="/ukm" class="nav-link {{ request()->is('ukm') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> UKM</a></li>
                @if(Auth::user() && (Auth::user()->role == 'dosen' || Auth::user()->role == 'kaprodi'))
                <li class="nav-item"><a href="/mahasiswa" class="nav-link {{ request()->is('mahasiswa') ? 'active' : '' }}"><i class="fa-solid fa-user-graduate"></i> Daftar Mahasiswa</a></li>
                @endif
                @if(Auth::user() && (Auth::user()->role == 'kaprodi' || Auth::user()->role == 'kemahasiswaan'))
                <li class="nav-item"><a href="/manajemen/jadwal" class="nav-link {{ request()->is('manajemen/jadwal*') ? 'active' : '' }}"><i class="fa-solid fa-clipboard-list"></i> Manajemen Jadwal</a></li>
                <li class="nav-item"><a href="/manajemen/jadwal-non-akademik" class="nav-link {{ request()->is('manajemen/jadwal-non-akademik*') ? 'active' : '' }}"><i class="fa-solid fa-calendar-check"></i> Manajemen Jadwal Non-Akademik</a></li>
                <li class="nav-item"><a href="/manajemen/matakuliah" class="nav-link {{ request()->is('manajemen/matakuliah*') ? 'active' : '' }}"><i class="fa-solid fa-book"></i> Manajemen Mata Kuliah</a></li>
                <li class="nav-item"><a href="/manajemen/event" class="nav-link {{ request()->is('manajemen/event*') ? 'active' : '' }}"><i class="fa-solid fa-bolt"></i> Manajemen Event</a></li>
                <li class="nav-item"><a href="/manajemen/ukm" class="nav-link {{ request()->is('manajemen/ukm*') ? 'active' : '' }}"><i class="fa-solid fa-users-gear"></i> Manajemen UKM</a></li>
                @endif
                <li class="nav-item mt-4"><form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-danger w-100"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</button></form></li>
            </ul>
        </nav>
        @endif
        <main class="flex-fill p-4">
            <button class="sidebar-toggle d-lg-none" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
            <div class="main-header">
                <div>
                    @yield('header')
                </div>
                @if(Auth::check())
                <div class="user-info">
                    <a href="/profil" class="d-flex align-items-center text-decoration-none text-dark" style="gap:12px; cursor:pointer;">
                        <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" class="rounded-circle" width="32" height="32" style="object-fit:cover;">
                        <span>{{ Auth::user()->name }}</span>
                        <span class="badge bg-primary text-white text-capitalize">{{ Auth::user()->role }}</span>
                    </a>
                </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 