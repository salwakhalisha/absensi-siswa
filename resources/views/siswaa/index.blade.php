@extends('templatesiswa.layouts')
@section('konten')
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
        <a href="{{route('siswaa.absen.riwayat')}}" class="bg-cyan-400 text-[#1A0956] font-bold px-6 py-3 rounded-full hover:bg-cyan-300 transition">Lihat Riwayat Absensi</a>
        <a href="{{route('pengajuan.index')}}" class="bg-cyan-400 text-[#1A0956] font-bold px-6 py-3 rounded-full hover:bg-cyan-300 transition">Ajukan Absensi</a>
      </div>
    </div>

    <!-- Kanan: Gambar -->
    <div class="md:w-1/2 flex justify-center">
      <div class="bg-white p-6 rounded-2xl shadow-lg">
        <img src="{{ asset('dist/assets/images/faces/logo.png') }}" alt="Floating Image" class="float-img" />
      </div>
    </div>
@endsection