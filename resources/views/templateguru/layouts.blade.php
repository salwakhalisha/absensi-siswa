<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Absensiku</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('dist/assets/css/welcome.css') }}">
  @yield('css')
</head>
<body class="bg-[#1A0956] text-white min-h-screen font-sans">

  <!-- Navbar -->
  <nav class="flex justify-between items-center px-8 py-4">
    @include('templateguru.navbar')
    
  </nav>

  <!-- Hero Section -->
  <section class="flex flex-col md:flex-row items-center justify-between px-10 py-16 gap-10">
    @yield('konten')
    <!-- Kiri: Konten -->
  </section>

</body>
</html>