<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Absensiku</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
</head>
<body class="bg-[#1A0956] text-white min-h-screen font-sans">

  <!-- Navbar -->
  <nav class="flex justify-between items-center px-8 py-4">
    <div class="text-2xl font-bold">Absensiku</div>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
      <i class="mdi mdi-logout text-xl"></i>
      Log out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
  </nav>

  <!-- Hero Section -->
  <section class="flex flex-col md:flex-row items-center justify-between px-10 py-16 gap-10">
    
    <!-- Kiri: Konten -->
    <div class="md:w-1/2 pl-4 md:pl-12">
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-2 leading-tight">
        Kelola Absensi Siswa<br />
        dengan
      <div class="relative inline-block">
        <h1 class="text-4xl md:text-5xl font-bold text-white z-10 relative">Absensiku</h1>
        <div class="h-1 bg-cyan-400 w-full absolute bottom-0 left-0 z-0"></div>
      </div>

      </h1>


      <p class="text-gray-300 mb-8 text-lg">Selamat Datang {{ Auth::user()->username }}</p>

      <div class="flex gap-4">
        <a href="#" class="bg-cyan-400 text-[#1A0956] font-bold px-6 py-3 rounded-full hover:bg-cyan-300 transition">Lihat Riwayat Absensi</a>
      </div>
    </div>

    <!-- Kanan: Gambar -->
    <div class="md:w-1/2 flex justify-center">
      <div class="bg-white p-6 rounded-2xl shadow-lg">
        <img src="{{ asset('dist/assets/images/faces/love.png') }}" alt="Absensiku" class="w-64 h-auto" />
      </div>
    </div>
  </section>

</body>
</html>
