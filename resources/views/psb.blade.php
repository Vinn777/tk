<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Siswa Baru | TK An-Nahl</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #004B23;
            --secondary: #FFC300;
            --accent: #8FB9A8;
            --dark: #00301A;
            --light: #FDFCDC;
            --white: #FFFFFF;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 40px;
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        }

        header {
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
        }

        input, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #eee;
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 16px;
            transition: 0.3s;
            box-sizing: border-box;
        }

        input:focus, textarea:focus {
            border-color: var(--primary);
            outline: none;
            background: #f9fffb;
        }

        .btn-submit {
            background: var(--primary);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: var(--dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 75, 35, 0.2);
        }

        .back-link {
            text-decoration: none;
            color: #666;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
        }

        .back-link:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('home') }}" class="logo">TK An - <span style="color: var(--secondary);">Nahl</span></a>
        <a href="{{ route('home') }}" style="text-decoration: none; color: var(--dark); font-weight: 600;">Beranda</a>
    </header>

    <div class="container">
        <a href="{{ route('home') }}" class="back-link">← Kembali</a>
        <h1 style="margin-bottom: 10px; color: var(--primary);">Formulir Pendaftaran</h1>
        <p style="color: #666; margin-bottom: 40px;">Lengkapi data di bawah ini untuk mendaftarkan Ananda di TK An - Nahl.</p>

        <form action="{{ route('psb.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label>Nama Wali Murid</label>
                    <input type="text" name="parent_name" placeholder="Nama lengkap Ayah/Ibu" required>
                </div>
                <div class="form-group">
                    <label>Nama Calon Siswa</label>
                    <input type="text" name="child_name" placeholder="Nama lengkap anak" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label>Nomor WhatsApp</label>
                    <input type="tel" name="phone" placeholder="Contoh: 08123456789" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Alamat email aktif">
                </div>
            </div>

            <div class="form-group">
                <label>Catatan atau Pertanyaan</label>
                <textarea name="notes" rows="4" placeholder="Tuliskan pesan Anda di sini..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Kirim Pendaftaran</button>
        </form>
    </div>

    <footer style="text-align: center; padding: 40px; color: #666;">
        &copy; 2026 TK An - Nahl. Semua hak dilindungi.
    </footer>
</body>
</html>

