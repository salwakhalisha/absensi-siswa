<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Absensi Siswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #191054;
      color: white;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 10%;
    }

    .logo {
      font-weight: 700;
      font-size: 30px;
    }

    nav ul {
      display: flex;
      list-style: none;
    }

    nav ul li {
      margin-left: 20px;
    }

    nav ul li a {
      text-decoration: none;
      color: white;
      font-weight: 500;
    }

    .hero {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 60px 10%;
      flex-wrap: wrap;
    }

    .content {
      max-width: 600px;
    }

    .content h1 {
      font-size: 48px;
      margin-bottom: 20px;
    }

    .content h1 span {
      color: #ffffff;
      border-bottom: 4px solid #32e0c4;
    }

    .content p {
      font-size: 18px;
      margin-bottom: 30px;
      color: #bfbfd6;
    }

    .buttons {
      display: flex;
      align-items: center;
    }

    .btn-primary {
      background: #32e0c4;
      padding: 12px 24px;
      border-radius: 30px;
      color: #191054;
      text-decoration: none;
      font-weight: 600;
      margin-right: 20px;
    }


    .play-icon {
      background: transparent;
      border: 2px solid #32e0c4;
      border-radius: 50%;
      padding: 5px 8px;
      margin-right: 10px;
    }

    .image {
      animation: float 3s ease-in-out infinite;
    }

    .image img {
      max-width: 300px;
      border-radius: 20px;
      background: white;
    }

    /* Animasi gambar */
    @keyframes float {
      0% {
        transform: translatey(0px);
      }
      50% {
        transform: translatey(-20px);
      }
      100% {
        transform: translatey(0px);
      }
    }
  </style>
</head>
<body>

  <header class="navbar">
    <div class="logo">Absensiku</div>
  </header>

  <section class="hero">
    <div class="content">
      <h1>Kelola Absensi Siswa dengan <span>Absensiku</span></h1>
      <p>Selamat Datang Siswa Dan Guru</p>
      <div class="buttons">
        <a href="#" class="btn-primary">Absen</a>
        <a href="#" class="btn-primary">Lihat Riwayat Absensi</a>
      </div>
    </div>
    <div class="image">
    <img src="{{ asset('dist/assets/images/faces/love.png') }}" alt="App Screens">
    </div>
  </section>

</body>
</html>
