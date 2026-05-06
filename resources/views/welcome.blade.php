<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TK An - Nahl - Sistem Perencanaan & Kegiatan Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #004B23;
            --primary-light: #006430;
            --secondary: #FFC300;
            --secondary-light: #FFD64D;
            --accent: #8FB9A8;
            --dark: #00301A;
            --light: #FDFCDC;
            --white: #FFFFFF;
            --soft-yellow: #FFF9E6;
            --soft-green: #E6F2EB;
            --gray-text: #5A6B5F;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        header {
            padding: 15px 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
            transition: 0.4s;
        }

        header.scrolled {
            padding: 10px 80px;
            background: rgba(255, 255, 255, 0.95);
        }

        .logo {
            font-size: 26px;
            font-weight: 800;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .logo span {
            color: var(--secondary);
        }

        nav {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        nav a {
            text-decoration: none;
            color: var(--gray-text);
            padding: 10px 18px;
            font-weight: 600;
            transition: 0.3s;
            font-size: 15px;
            border-radius: 12px;
        }

        nav a:hover {
            color: var(--primary);
            background: var(--soft-green);
        }

        nav a.active {
            color: var(--primary);
            background: var(--soft-green);
        }

        .btn-group {
            display: flex;
            gap: 12px;
            margin-left: 20px;
            padding-left: 20px;
            border-left: 1px solid #eee;
        }

        .btn-login {
            background: var(--primary);
            color: var(--white) !important;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            background: var(--dark);
            box-shadow: 0 10px 20px rgba(0, 48, 26, 0.2);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary) !important;
            border: 2px solid var(--primary);
            padding: 10px 26px;
        }

        .hero {
            padding: 180px 80px 120px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 100vh;
            background: radial-gradient(circle at 80% 20%, var(--soft-yellow) 0%, #fff 50%);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 5%;
            width: 300px;
            height: 300px;
            background: var(--soft-green);
            filter: blur(100px);
            border-radius: 50%;
            z-index: 0;
            opacity: 0.5;
        }

        .hero-content {
            flex: 1;
            max-width: 650px;
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 72px;
            line-height: 1.05;
            margin-bottom: 25px;
            color: var(--dark);
            font-weight: 800;
            letter-spacing: -2px;
        }

        .hero-content h1 span {
            color: var(--primary);
            display: inline-block;
        }

        .hero-content p {
            font-size: 20px;
            color: var(--gray-text);
            margin-bottom: 45px;
            line-height: 1.7;
            max-width: 550px;
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            position: relative;
            z-index: 1;
        }

        .hero-image img {
            width: 100%;
            max-width: 600px;
            border-radius: 40px;
            box-shadow: 40px 40px 100px rgba(0, 75, 35, 0.12);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(1deg); }
        }

        .section-title {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-title h2 {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 20px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .section-title p {
            color: var(--gray-text);
            font-size: 18px;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .programs {
            padding: 140px 80px;
            background: var(--white);
        }

        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .program-card {
            background: var(--white);
            border-radius: 35px;
            padding: 45px;
            border: 1px solid #f0f0f0;
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .program-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--primary);
            transform: scaleX(0);
            transition: 0.4s;
            transform-origin: left;
        }

        .program-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 60px rgba(0, 75, 35, 0.06);
            border-color: var(--soft-green);
        }

        .program-card:hover::after {
            transform: scaleX(1);
        }

        .program-tag {
            display: inline-block;
            padding: 6px 16px;
            background: var(--soft-yellow);
            color: #B8860B;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .program-card h3 {
            color: var(--primary);
            font-size: 26px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .program-card p {
            color: var(--gray-text);
            line-height: 1.7;
            font-size: 16px;
        }

        .features {
            padding: 140px 80px;
            background: var(--soft-green);
            border-radius: 100px 100px 0 0;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .feature-card {
            padding: 50px 40px;
            background: var(--white);
            border-radius: 40px;
            transition: 0.4s;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 75, 35, 0.03);
        }

        .feature-card i {
            font-size: 56px;
            color: var(--primary);
            margin-bottom: 30px;
            background: var(--soft-green);
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            margin-left: auto;
            margin-right: auto;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0, 75, 35, 0.1);
        }

        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: var(--primary);
            font-weight: 700;
        }

        .feature-card p {
            color: var(--gray-text);
            line-height: 1.6;
        }

        .about {
            padding: 140px 80px;
            display: flex;
            align-items: center;
            gap: 100px;
            background: var(--white);
        }

        .about-image {
            flex: 1;
            position: relative;
        }

        .about-image img {
            width: 100%;
            max-width: 550px;
            border-radius: 50px;
            box-shadow: 30px 30px 80px rgba(0,0,0,0.08);
        }

        .about-image::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border: 2px solid var(--secondary);
            top: 20px;
            left: 20px;
            border-radius: 50px;
            z-index: -1;
        }

        .about-content {
            flex: 1;
        }

        .testimonials {
            padding: 140px 80px;
            background: var(--soft-yellow);
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background: var(--white);
            padding: 50px;
            border-radius: 40px;
            position: relative;
            box-shadow: 0 15px 40px rgba(0,0,0,0.02);
        }

        .testimonial-card p {
            font-size: 18px;
            line-height: 1.8;
            color: var(--gray-text);
            margin-bottom: 30px;
            font-style: italic;
        }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: var(--secondary);
            color: var(--dark);
            padding: 20px 45px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 800;
            font-size: 18px;
            transition: 0.4s;
            box-shadow: 0 15px 35px rgba(255, 195, 0, 0.3);
        }

        .cta-btn:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 75, 35, 0.25);
        }

        .whatsapp-float {
            position: fixed;
            bottom: 40px;
            right: 40px;
            background: #25D366;
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            box-shadow: 0 15px 35px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            text-decoration: none;
            transition: 0.4s;
        }

        .whatsapp-float:hover {
            transform: scale(1.1) rotate(10deg);
        }

        footer {
            padding: 100px 80px 50px;
            background: var(--dark);
            color: var(--white);
            border-radius: 100px 100px 0 0;
        }

        @media (max-width: 1024px) {
            header, .hero, .programs, .features, .about, .testimonials, footer { padding-left: 40px; padding-right: 40px; }
            .hero-content h1 { font-size: 56px; }
            .about { flex-direction: column; text-align: center; }
        }

        @media (max-width: 768px) {
            nav { display: none; }
            .hero { flex-direction: column; text-align: center; padding-top: 150px; }
            .hero-content h1 { font-size: 42px; }
            .hero-image { margin-top: 50px; }
        }
    </style>
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <a href="https://wa.me/628xx" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <header>
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 45px; max-height: 45px;">
            TK An - <span>Nahl</span>
        </a>
        <nav>
            <a href="#home">Beranda</a>
            <a href="#programs">Program</a>
            <a href="#features">Fasilitas</a>
            <a href="{{ route('psb.index') }}" style="color: var(--primary); font-weight: 700;">PSB Online</a>
            <a href="{{ route('feedback.create') }}">Saran & Kritik</a>
            
            <div class="btn-group">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-login">Dashboard</a>
                    @else
                        <a href="{{ route('login.parent') }}" class="btn-login" style="background: var(--secondary); color: var(--dark) !important;">
                            <i class="fas fa-user-friends"></i> Wali Murid
                        </a>
                        <a href="{{ route('login') }}" class="btn-login btn-outline">
                            <i class="fas fa-user-tie"></i> Guru
                        </a>
                    @endauth
                @endif
            </div>
        </nav>
    </header>

    <section class="hero" id="home">
        <div class="hero-content">
            <span style="color: var(--primary); font-weight: 800; text-transform: uppercase; letter-spacing: 3px; font-size: 14px; margin-bottom: 20px; display: block;">Selamat Datang di TK An - Nahl</span>
            <h1>Mendidik dengan <span>Hati</span>, Membangun <span>Prestasi</span></h1>
            <p>Lingkungan belajar yang ceria, islami, dan inspiratif untuk membantu Ananda mengeksplorasi potensi terbaiknya sejak dini.</p>
            <div style="display: flex; gap: 20px;">
                <a href="{{ route('psb.index') }}" class="cta-btn">
                    Daftar Sekarang <i class="fas fa-arrow-right"></i>
                </a>
                <a href="#about" class="cta-btn" style="background: var(--white); color: var(--primary); box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                    Tentang Kami
                </a>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/banner.png') }}" alt="TK An - Nahl Banner">
        </div>
    </section>

    <section class="programs" id="programs">
        <div class="section-title">
            <h2>Program Unggulan</h2>
            <p>Kurikulum yang dirancang khusus untuk menyeimbangkan kecerdasan intelektual, emosional, dan spiritual.</p>
        </div>
        <div class="program-grid">
            <div class="program-card">
                <span class="program-tag">Usia 2-4 Tahun</span>
                <h3>Toddler & Playgroup</h3>
                <p>Fokus pada kemandirian dasar, motorik, dan pengenalan lingkungan sosial melalui metode bermain yang menyenangkan.</p>
            </div>
            <div class="program-card">
                <span class="program-tag">Usia 4-5 Tahun</span>
                <h3>Kelompok A</h3>
                <p>Eksplorasi kreativitas, pengenalan dasar literasi & numerasi, serta pembiasaan adab dan nilai-nilai islami.</p>
            </div>
            <div class="program-card">
                <span class="program-tag">Usia 5-6 Tahun</span>
                <h3>Kelompok B</h3>
                <p>Persiapan matang menuju jenjang Sekolah Dasar dengan metode yang menyenangkan dan membangun rasa percaya diri.</p>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="section-title">
            <h2>Fasilitas & Layanan</h2>
            <p>Menyediakan lingkungan terbaik untuk mendukung kenyamanan belajar putra-putri Anda.</p>
        </div>
        <div class="feature-grid">
            <div class="feature-card">
                <i class="fas fa-heart"></i>
                <h3>Kasih Sayang</h3>
                <p>Pendidik yang sabar dan penuh perhatian, menciptakan suasana sekolah seperti rumah kedua.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-star"></i>
                <h3>Nilai Islami</h3>
                <p>Pembiasaan ibadah harian dan hafalan doa yang dikemas secara interaktif dan ceria.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Keamanan</h3>
                <p>Area sekolah yang terpantau dan aman, memberikan ketenangan pikiran bagi para orang tua.</p>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-image">
            <img src="{{ asset('images/activities.png') }}" alt="Kegiatan TK">
        </div>
        <div class="about-content">
            <h2 style="font-size: 48px; color: var(--primary); margin-bottom: 25px; font-weight: 800;">Tentang <span>TK An - Nahl</span></h2>
            <p style="font-size: 19px; line-height: 1.8; color: var(--gray-text); margin-bottom: 25px;">TK An - Nahl mengambil inspirasi dari lebah (An-Nahl) yang rajin, bekerja sama, dan menghasilkan madu yang bermanfaat bagi sesama.</p>
            <p style="font-size: 19px; line-height: 1.8; color: var(--gray-text); margin-bottom: 30px;">Kami berkomitmen mendidik anak-anak agar memiliki karakter yang kuat, cerdas secara intelektual, dan memiliki akhlak mulia seperti filosofi lebah yang selalu mencari kebaikan di setiap bunga.</p>
            <a href="{{ route('psb.index') }}" class="cta-btn" style="padding: 15px 35px; font-size: 16px;">Gabung Bersama Kami</a>
        </div>
    </section>

    <section class="testimonials">
        <div class="section-title">
            <h2>Suara Orang Tua</h2>
            <p>Kebahagiaan dan testimoni nyata dari para wali murid yang telah mempercayakan pendidikan anandanya kepada kami.</p>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p>"Ananda jadi jauh lebih mandiri dan hafal banyak doa harian. Gurunya sangat telaten dan komunikatif dengan orang tua."</p>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 45px; height: 45px; background: var(--soft-green); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: 800;">B</div>
                    <strong>Bunda Alif</strong>
                </div>
            </div>
            <div class="testimonial-card">
                <p>"Lingkungan sekolahnya sangat asri dan islami. Saya merasa tenang menitipkan anak saya di sini karena keamanannya terjaga."</p>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 45px; height: 45px; background: var(--soft-yellow); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #B8860B; font-weight: 800;">A</div>
                    <strong>Ayah Farhan</strong>
                </div>
            </div>
            <div class="testimonial-card">
                <p>"Metode belajarnya sangat seru! Anak saya tidak pernah bosan dan selalu antusias menceritakan kegiatannya saat pulang sekolah."</p>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 45px; height: 45px; background: var(--soft-green); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: 800;">B</div>
                    <strong>Bunda Keysha</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="location-section" id="location">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div class="section-title">
                <h2>Kunjungi Kami</h2>
                <p>Mari melihat langsung keceriaan belajar di kampus kami.</p>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 60px; align-items: center;">
                <div>
                    <div style="margin-bottom: 30px;">
                        <h3 style="color: var(--primary); margin-bottom: 10px;"><i class="fas fa-map-marker-alt" style="margin-right: 10px;"></i> Alamat</h3>
                        <p style="color: #666; line-height: 1.6;">Jl. Kepodang No.50, Susunan Baru, Kec. Tj. Karang Bar., Kota Bandar Lampung, Lampung 35115</p>
                    </div>
                    <div style="margin-bottom: 30px;">
                        <h3 style="color: var(--primary); margin-bottom: 10px;"><i class="fas fa-phone-alt" style="margin-right: 10px;"></i> Kontak</h3>
                        <p style="color: #666;">WhatsApp: 08xx-xxxx-xxxx</p>
                        <p style="color: #666;">Email: info@tkan-nahl.sch.id</p>
                    </div>
                    <a href="https://maps.app.goo.gl/5y6bLKGbiAm2TfaKA" target="_blank" class="cta-btn" style="padding: 12px 30px; font-size: 15px;">Buka di Google Maps</a>
                </div>
                <div style="height: 450px; border-radius: 40px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.100!2d105.2354652!3d-5.4033721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMjQnMTIuMSJTIDEwNcKwMTQnMDcuNyJF!5e0!3m2!1sen!2sid!4v1714896000000!5m2!1sen!2sid&q=Jl.+Kepodang+No.50,+Susunan+Baru,+Bandar+Lampung" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 60px; text-align: left; margin-bottom: 60px;">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px; filter: brightness(0) invert(1); margin-bottom: 25px;">
                <h3 style="font-size: 24px; margin-bottom: 15px;">TK An - Nahl</h3>
                <p style="opacity: 0.7; line-height: 1.8;">Membentuk generasi cerdas, mandiri, dan berakhlak mulia melalui pendidikan yang inspiratif dan penuh kasih sayang.</p>
            </div>
            <div>
                <h4 style="font-size: 18px; margin-bottom: 25px; color: var(--secondary);">Tautan Cepat</h4>
                <ul style="list-style: none; padding: 0; line-height: 2.5;">
                    <li><a href="#home" style="color: white; text-decoration: none; opacity: 0.8;">Beranda</a></li>
                    <li><a href="#programs" style="color: white; text-decoration: none; opacity: 0.8;">Program Unggulan</a></li>
                    <li><a href="#features" style="color: white; text-decoration: none; opacity: 0.8;">Fasilitas</a></li>
                    <li><a href="{{ route('psb.index') }}" style="color: white; text-decoration: none; opacity: 0.8;">PSB Online</a></li>
                    <li><a href="{{ route('feedback.create') }}" style="color: white; text-decoration: none; opacity: 0.8;">Saran & Kritik</a></li>
                </ul>
            </div>
            <div>
                <h4 style="font-size: 18px; margin-bottom: 25px; color: var(--secondary);">Hubungi Kami</h4>
                <p style="opacity: 0.7; line-height: 1.8; margin-bottom: 10px;">
                    <i class="fas fa-map-marker-alt" style="margin-right: 10px; color: var(--secondary);"></i> 
                    Jl. Kepodang No.50, Susunan Baru, Bandar Lampung
                </p>
                <p style="opacity: 0.7; line-height: 1.8;">
                    <i class="fas fa-envelope" style="margin-right: 10px; color: var(--secondary);"></i> 
                    info@tkan-nahl.sch.id
                </p>
            </div>
        </div>
        <div style="border-top: 1px solid rgba(255,255,255,0.1); pt-40px; padding-top: 40px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            <p style="opacity: 0.5; font-size: 14px;">&copy; 2026 TK An - Nahl. Seluruh hak cipta dilindungi.</p>
            <div style="display: flex; gap: 20px;">
                <a href="#" style="color: white; font-size: 20px; opacity: 0.7;"><i class="fab fa-instagram"></i></a>
                <a href="#" style="color: white; font-size: 20px; opacity: 0.7;"><i class="fab fa-facebook"></i></a>
                <a href="#" style="color: white; font-size: 20px; opacity: 0.7;"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>


