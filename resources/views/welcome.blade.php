<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Joestar Library | Perpustakaan Digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            position: relative;
            color: #4a3b6e;
        }

        /* Watery Lavender Background */
        .watery-bg {
            position: fixed;
            inset: 0;
            background: linear-gradient(145deg, #f0e6ff 0%, #d9c9ff 30%, #c2b0ff 60%, #e6d9ff 100%);
            background-size: 400% 400%;
            animation: waterFlow 15s ease infinite;
            z-index: -2;
        }

        @keyframes waterFlow {
            0% { background-position: 0% 0%; }
            25% { background-position: 50% 25%; }
            50% { background-position: 100% 50%; }
            75% { background-position: 50% 75%; }
            100% { background-position: 0% 100%; }
        }

        /* Water Ripple Effect */
        .water-ripple {
            position: fixed;
            inset: 0;
            background:
                radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.3) 0%, transparent 30%),
                radial-gradient(circle at 70% 80%, rgba(200, 180, 255, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 10% 20%, rgba(230, 210, 255, 0.5) 0%, transparent 50%),
                radial-gradient(circle at 90% 40%, rgba(180, 150, 255, 0.3) 0%, transparent 45%);
            animation: rippleMove 20s infinite alternate;
            z-index: -1;
            pointer-events: none;
        }

        @keyframes rippleMove {
            0% { transform: scale(1) rotate(0deg); opacity: 0.4; }
            50% { transform: scale(1.2) rotate(5deg); opacity: 0.6; }
            100% { transform: scale(0.9) rotate(-5deg); opacity: 0.5; }
        }

        /* Floating Bubbles */
        .bubble {
            position: fixed;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(230, 210, 255, 0.3));
            border-radius: 50%;
            filter: blur(5px);
            animation: bubbleFloat 15s infinite ease-in-out;
            z-index: -1;
            pointer-events: none;
        }

        @keyframes bubbleFloat {
            0%, 100% {
                transform: translateY(0) translateX(0) scale(1);
                opacity: 0.3;
            }
            25% {
                transform: translateY(-30px) translateX(15px) scale(1.1);
                opacity: 0.5;
            }
            50% {
                transform: translateY(0) translateX(30px) scale(0.9);
                opacity: 0.4;
            }
            75% {
                transform: translateY(30px) translateX(-15px) scale(1.2);
                opacity: 0.6;
            }
        }

        .bubble-1 {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .bubble-2 {
            width: 400px;
            height: 400px;
            bottom: 10%;
            right: 5%;
            animation-delay: -3s;
        }

        .bubble-3 {
            width: 200px;
            height: 200px;
            top: 40%;
            right: 20%;
            animation-delay: -6s;
        }
    

        .bubble-4 {
            width: 350px;
            height: 350px;
            bottom: 30%;
            left: 15%;
            animation-delay: -9s;
        }

        /* Wave Lines */
        .wave-lines {
            position: fixed;
            inset: 0;
            background: repeating-linear-gradient(
                transparent 0px,
                transparent 20px,
                rgba(210, 190, 255, 0.1) 20px,
                rgba(210, 190, 255, 0.1) 22px
            );
            animation: waveMove 8s infinite linear;
            z-index: -1;
            pointer-events: none;
        }

        @keyframes waveMove {
            from { background-position: 0 0; }
            to { background-position: 0 40px; }
        }

        /* Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 20px 50px rgba(150, 120, 255, 0.15),
                        0 0 0 1px rgba(255, 255, 255, 0.4) inset;
            transition: all 0.3s ease;
            border-radius: 24px;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 25px 60px rgba(150, 120, 255, 0.25);
            transform: translateY(-5px);
        }

        /* Section Background */
        .section-bg {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);
        }

        /* Layout */
        section {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 1rem;
            position: relative;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        /* Hero Section */
        .hero-content {
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-wrapper {
            width: 96px;
            height: 96px;
            margin: 0 auto 2rem auto;
        }

        .logo {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.1);
        }

        .logo i {
            font-size: 2.5rem;
            color: #4a3b6e;
        }

        h1 {
            font-size: 4rem;
            font-weight: 300;
            letter-spacing: -0.025em;
            margin-bottom: 1rem;
            color: #4a3b6e;
        }

        h1 span {
            font-weight: 700;
            color: #7b68b0;
        }

        .subtitle {
            font-size: 1.25rem;
            color: #6b5b8e;
            max-width: 600px;
            margin: 0 auto 3rem auto;
            font-weight: 300;
        }

        /* Button Jelajahi - Langsung ke Login */
        .btn-jelajahi {
            display: inline-block;
            padding: 1.2rem 3rem;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 50px;
            color: #4a3b6e;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            letter-spacing: 1px;
            box-shadow: 0 10px 30px rgba(150, 120, 255, 0.2);
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .btn-jelajahi:hover {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.9);
            box-shadow: 0 15px 40px rgba(150, 120, 255, 0.3);
            transform: translateY(-3px) scale(1.05);
        }

        .btn-jelajahi i {
            margin-left: 10px;
            transition: transform 0.3s ease;
        }

        .btn-jelajahi:hover i {
            transform: translateX(5px);
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
            cursor: pointer;
            z-index: 20;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateX(-50%) translateY(0);}
            40% {transform: translateX(-50%) translateY(-20px);}
            60% {transform: translateX(-50%) translateY(-10px);}
        }

        .scroll-indicator .indicator {
            width: 40px;
            height: 64px;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .indicator-dot {
            width: 4px;
            height: 12px;
            background: rgba(74, 59, 110, 0.6);
            border-radius: 999px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Section Title */
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 300;
            color: #4a3b6e;
            margin-bottom: 1rem;
        }

        .section-title h2 span {
            font-weight: 700;
            color: #7b68b0;
        }

        .section-title p {
            color: #6b5b8e;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .features-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .feature-card {
            padding: 2rem;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(150, 120, 255, 0.15);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 25px 60px rgba(150, 120, 255, 0.25);
            transform: translateY(-5px);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .feature-icon i {
            font-size: 1.25rem;
            color: #4a3b6e;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            font-weight: 500;
            color: #4a3b6e;
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            color: #6b5b8e;
            font-size: 0.875rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .feature-meta {
            font-size: 0.75rem;
            color: #6b5b8e;
        }

        /* Statistics Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            text-align: center;
        }

        @media (min-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: 300;
            color: #4a3b6e;
            margin-bottom: 0.5rem;
        }

        .stat-item p {
            font-size: 0.875rem;
            color: #6b5b8e;
        }

        /* FAQ */
        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 16px;
            margin-bottom: 1rem;
            overflow: hidden;
        }

        details summary {
            padding: 1.5rem;
            cursor: pointer;
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #4a3b6e;
            font-weight: 500;
        }

        details summary::-webkit-details-marker {
            display: none;
        }

        details summary i {
            color: #6b5b8e;
            transition: transform 0.3s ease;
        }

        details[open] summary i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem 1.5rem;
            color: #6b5b8e;
            font-size: 0.875rem;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            padding: 3rem 1rem;
            background: rgba(217, 201, 255, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 768px) {
            .footer-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .footer-col h4 {
            font-size: 0.875rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: rgba(74, 59, 110, 0.6);
            margin-bottom: 1rem;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 0.5rem;
        }

        .footer-col ul li a {
            color: #6b5b8e;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: #4a3b6e;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4a3b6e;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.6);
            transform: translateY(-3px);
        }

        .copyright {
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.4);
            text-align: center;
            color: #6b5b8e;
            font-size: 0.75rem;
        }

        .copyright i {
            color: #7b68b0;
            margin: 0 0.25rem;
        }

        /* Back to Top */
        .back-to-top {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4a3b6e;
            text-decoration: none;
            transition: all 0.3s ease;
            z-index: 30;
        }

        .back-to-top:hover {
            background: rgba(255, 255, 255, 0.6);
            transform: translateY(-3px);
        }

        /* Navigation Dots */
        .nav-dots {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            display: flex;
            gap: 0.5rem;
            z-index: 30;
        }

        .nav-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(74, 59, 110, 0.3);
        }

        .nav-dot.active {
            background: rgba(74, 59, 110, 0.6);
        }

        /* Utilities */
        .py-24 {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="watery-bg"></div>
    <div class="water-ripple"></div>
    <div class="wave-lines"></div>

    <!-- Bubbles -->
    <div class="bubble bubble-1"></div>
    <div class="bubble bubble-2"></div>
    <div class="bubble bubble-3"></div>
    <div class="bubble bubble-4"></div>

    <!-- Navigation Dots -->
    <div class="nav-dots">
        <div class="nav-dot active"></div>
        <div class="nav-dot"></div>
        <div class="nav-dot"></div>
        <div class="nav-dot"></div>
        <div class="nav-dot"></div>
    </div>

    <!-- Hero Section -->
    <section>
        <div class="container">
            <div class="hero-content">
                <div class="logo-wrapper">
                    <div class="logo">
                        <i class="fas fa-book-open"></i>
                    </div>
                </div>

                <h1>Joestar<span>library</span></h1>
                <p class="subtitle">Jelajahi dunia pengetahuan dalam genggamanmu.</p>

                <!-- Button Ayo Jelajahi - LANGSUNG KE HALAMAN LOGIN -->
                <a href="{{ route('login') }}" class="btn-jelajahi">
                    Ayo Jelajahi <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Scroll Indicator - Tetap ke bagian Layanan -->
        <a href="#layanan" class="scroll-indicator">
            <div class="indicator">
                <div class="indicator-dot"></div>
            </div>
        </a>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="section-bg py-24 px-4">
        <div class="container">
            <div class="section-title">
                <h2>Layanan <span>Kami</span></h2>
                <p>Temukan berbagai fitur yang tersedia untuk pengalaman membaca yang lebih baik</p>
            </div>

            <div class="features-grid">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3>Koleksi Digital</h3>
                    <p>Akses ribuan buku digital, jurnal, dan artikel dari berbagai genre dan kategori.</p>
                    <div class="feature-meta">1,234+ koleksi</div>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Peminjaman Online</h3>
                    <p>Pinjam buku kapan saja, di mana saja. Proses cepat dan pengembalian mudah.</p>
                    <div class="feature-meta">24/7 Layanan</div>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Komunitas</h3>
                    <p>Diskusi buku, rekomendasi, dan berbagi review dengan sesama pembaca.</p>
                    <div class="feature-meta">500+ anggota aktif</div>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Akses Mobile</h3>
                    <p>Baca di mana saja dengan tampilan responsif di smartphone dan tablet.</p>
                    <div class="feature-meta">Mobile friendly</div>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Pencarian Canggih</h3>
                    <p>Temukan buku berdasarkan judul, penulis, kategori, atau kata kunci.</p>
                    <div class="feature-meta">Filter & sortir</div>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <h3>Bookmark & Catatan</h3>
                    <p>Simpan halaman favorit dan buat catatan pribadi untuk setiap buku.</p>
                    <div class="feature-meta">Sinkronisasi cloud</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-24 px-4" style="background: rgba(230, 217, 255, 0.3); backdrop-filter: blur(10px);">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3>5K+</h3>
                    <p>Buku Digital</p>
                </div>
                <div class="stat-item">
                    <h3>2.5K+</h3>
                    <p>Anggota Aktif</p>
                </div>
                <div class="stat-item">
                    <h3>15K+</h3>
                    <p>Peminjaman</p>
                </div>
                <div class="stat-item">
                    <h3>50+</h3>
                    <p>Kategori</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-bg py-24 px-4">
        <div class="container">
            <div class="section-title">
                <h2>Pertanyaan <span>Umum</span></h2>
            </div>

            <div class="faq-container">
                <!-- FAQ 1 -->
                <div class="faq-item">
                    <details>
                        <summary>
                            Bagaimana cara mendaftar sebagai anggota?
                            <i class="fas fa-chevron-down"></i>
                        </summary>
                        <div class="faq-answer">
                            Anda dapat mendaftar melalui halaman registrasi dengan mengisi formulir pendaftaran menggunakan email sekolah atau data diri yang valid. Proses verifikasi biasanya memakan waktu 1x24 jam.
                        </div>
                    </details>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item">
                    <details>
                        <summary>
                            Berapa lama masa peminjaman buku digital?
                            <i class="fas fa-chevron-down"></i>
                        </summary>
                        <div class="faq-answer">
                            Masa peminjaman buku digital adalah 14 hari dan dapat diperpanjang maksimal 2 kali jika tidak ada peminjam lain yang mengantri.
                        </div>
                    </details>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item">
                    <details>
                        <summary>
                            Apakah ada batasan jumlah buku yang bisa dipinjam?
                            <i class="fas fa-chevron-down"></i>
                        </summary>
                        <div class="faq-answer">
                            Setiap anggota dapat meminjam maksimal 3 buku dalam waktu bersamaan. Untuk keperluan penelitian khusus, dapat mengajukan permohonan penambahan kuota.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <!-- About -->
                <div class="footer-col">
                    <h4>Tentang</h4>
                    <ul>
                        <li><a href="#">Perpustakaan</a></li>
                        <li><a href="#">Visi & Misi</a></li>
                        <li><a href="#">Tim Kami</a></li>
                    </ul>
                </div>

                <!-- Layanan -->
                <div class="footer-col">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="#">Peminjaman</a></li>
                        <li><a href="#">Koleksi Digital</a></li>
                        <li><a href="#">Bantuan</a></li>
                    </ul>
                </div>

                <!-- Bantuan -->
                <div class="footer-col">
                    <h4>Bantuan</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="#">Panduan</a></li>
                    </ul>
                </div>

                <!-- Connect -->
                <div class="footer-col">
                    <h4>Terhubung</h4>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="copyright">
                &copy; 2026 Aeternum Library. Floating on lavender dreams <i class="fas fa-water"></i>
            </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
</body>
</html>
