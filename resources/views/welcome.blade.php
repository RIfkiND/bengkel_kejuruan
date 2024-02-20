<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="/Asset/css/welcome.css" rel="stylesheet">
    <title>Manajemen Bengkel</title>
</head>

<body>

    <div class="navbar">
        <h2>Beranda </h2>
        <ul>
            <li><a href="#1">Beranda</a></li>
            <li><a href="#Pencapaian">Pencapaian</a></li>
            <li><a href="#Tentang">Tentang</a></li>
        </ul>
        @if (auth()->user())
            <a href="{{ route('admin.index') }}"><button class="hire-btn">Ke Dashboard</button></a>
        @else
            <a href="{{ route('login') }}"><button class="hire-btn">Login</button></a>
        @endif
    </div>

    <div class="main">
        <h4>Selamat Datang, di <span>Manajemen Bengkel</span> 👋</h4>
        <p class="title">Web pengelola barang</p>
        <p class="subtitle">dengan mudah dan praktis.</p>
    </div>

    <h5 class="seprator" id="Pencapaian">Pencapaian</h5>
    <div class="guarantee">
        <div class="item">
            <div class="icon">
                <i class='bx bx-user'></i>
            </div>
            <div class="info">
                <h3>{{ $users->count()}}</h3>
                <p>Akun yang terdaftar</p>
            </div>
            <i class='bx bx-chevron-right'></i>
        </div>
        <div class="item">
            <div class="icon">
                <i class='bx bx-home'></i>
            </div>
            <div class="info">
                <h3>{{ $sekolahs->count() }}</h3>
                <p>Sekolah</p>
            </div>
            <i class='bx bx-chevron-right'></i>
        </div>
        <div class="item">
            <div class="icon">
                <i class='bx bx-laugh'></i>
            </div>
            <div class="info">
                <h3>Mudah</h3>
                <p></p>
            </div>
            <i class='bx bx-chevron-right'></i>
        </div>
    </div>

    <h5 class="seprator" id="Tentang">Tentang</h5>

    <div class="about">
        <img src="../Asset/images/login.png">
        <div class="info">
            <h3>Tentang Manajemen Bengkel</h3>
            <p>Adalah sebuah web yang dirancang untuk memudahkan pengelolaan barang disuatu sekolah
                dengan mudah dan praktis. Yang dimana web ini menjadi perantara antara Admin Sekolah, Kepala
                Bengkel, dan Guru. Fitur yang tersedia diantaranya, pengelolaan stok barang, transaksi barang,
                pemeliharaan barang
                peminjaman barang dan lain-lain.
            </p>
        </div>
    </div>


    <footer>
        <div class="start">
            <h3>Mulai mengelola</h3>
            @if (auth()->user())
                <p>Anda sudah login, silahkan ke dashboard untuk mengelola barang.</p>
                <a href="{{ route('admin.index') }}"><button>Ke Dashboard</button></a>
            @else
                <p>Login untuk membuka web ini, tanyakan Admin Sekolah jika ada kendala saat login.</p>
                <a href="{{ route('login') }}"><button>Login sekarang</button></a>
            @endif
        </div>

        <div class="cols">
            <div class="about-col">
                <h3>Manajemen Bengkel</h3>
                <p>Web pengelola barang</p>
            </div>

            <div class="links-col">
                <h4>Useful Links</h4>
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Skills</a>
                <a href="#">Portfolio</a>
                <a href="#">Contact</a>
            </div>

            <div class="links-col">
                <h4>Social Media</h4>
                <a href="#">Instagram</a>
                <a href="#">Linkedin</a>
                <a href="#">Dribble</a>
                <a href="#">Youtube</a>
                <a href="#">Github</a>
            </div>

            <div class="news-col">
                <h4>NewsLetter</h4>
                <p>Enter your email and get notified about news, of.</p>

                <form>
                    <input type="email" placeholder="Your email address">
                    <button><i class='bx bxl-telegram'></i></button>
                </form>

            </div>

        </div>

    </footer>

</body>

</html>
