<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penjadwalan Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background:rgb(165, 151, 24);
        }
        .main-header {
            background:rgb(194, 192, 64);
            color: #fff;
            padding: 2rem 0 1.5rem 0;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            box-shadow: 0 4px 24px rgba(13, 71, 161, 0.08);
        }
        .main-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
            margin-top: -60px;
            padding: 2.5rem 2rem 2rem 2rem;
        }
        .btn-login {
            background:rgb(18, 180, 31);
            color: #fff;
            font-size: 1.2rem;
            padding: 0.7rem 2.5rem;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.10);
            transition: background 0.2s;
        }
        .btn-login:hover {
            background:rgb(152, 204, 84);
            color: #fff;
        }
        .main-card h1 {
            font-size: 2.3rem;
            font-weight: 700;
            color:rgb(4, 110, 57);
        }
        .main-card hr {
            margin: 2rem 0 1.5rem 0;
        }
        .main-card ul {
            margin-bottom: 1.5rem;
        }
        .main-card li {
            font-size: 1.08rem;
            margin-bottom: 0.5rem;
        }
        .footer {
            color: #888;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div class="main-header text-center">
        <h2 class="fw-bold mb-0">SISTEM INFORMASI PENJADWALAN</h2>
        <div class="mt-2" style="font-size:1.1rem;">Universitas Suka Suka Sendiri</div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="main-card mt-4 text-center">
                    <h1 class="mb-3">Sistem Penjadwalan Akademik & Non-Akademik</h1>
                    <p class="lead mb-4">Selamat datang di sistem penjadwalan untuk Mahasiswa, Dosen, Kaprodi, dan Kemahasiswaan.<br>Silakan login untuk mengakses fitur lengkap.</p>
                    <a href="{{ route('login') }}" class="btn btn-login mb-3">Login</a>
                    <hr>
                    <h5 class="fw-semibold mb-3">Menu Utama</h5>
                    <ul class="list-unstyled">
                        <li>• Lihat Jadwal Perkuliahan (setelah login)</li>
                        <li>• Daftar Event & UKM (setelah login)</li>
                        <li>• Manajemen Jadwal, Event, UKM (khusus Kaprodi/Kemahasiswaan)</li>
                    </ul>
                    <div class="footer mt-3">© {{ date('Y') }} Sistem Penjadwalan Akademik</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 