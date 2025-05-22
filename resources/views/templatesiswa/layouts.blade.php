<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Absensiku</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('dist/assets/css/welcomesiswa.css') }}">
  @yield('css')
</head>
<body class="bg-[#1A0956] text-white min-h-screen font-sans">

  <!-- Navbar -->
  <nav class="flex justify-between items-center px-8 py-4">
    @include('templateguru.navbar')
    
  </nav>

  <!-- Hero Section -->
  <section class="flex justify-center px-4 py-8">
    @yield('konten')
    <!-- Kiri: Konten -->
  </section>

</body>
</html>