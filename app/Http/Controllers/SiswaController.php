<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\lokal;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    { 
        $datasiswa = Siswa::all();
        return view('admin.siswa.index', [
            "menu" => "siswa",
            'title' => 'Data siswa',
            'datasiswa' => $datasiswa
        ]);
    }

    public function create()
    {
        $lokal = lokal::all();
        return view('admin.siswa.create', [
            'menu' => 'siswa',
            'title' => 'Tambah Data Siswa',
            'lokal' => $lokal
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jk' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_id' => 'nullable',
            'lokal_id' => 'nullable'
        ], [
            'nisn.required' => 'nisn Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'telp.required' => 'Nomor HP Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);
        
        $user = new User();
        $user->name = 'siswa';
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'siswa';
        $user->save();


        $siswa = new Siswa;
        $siswa->nisn = $validasi['nisn'];
        $siswa->nama = $validasi['nama'];
        $siswa->alamat = $validasi['alamat'];
        $siswa->telp = $validasi['telp'];
        $siswa->jk = $validasi['jk'];
        $siswa->username = $validasi['username'];
        $siswa->password = bcrypt($validasi['password']);
        $siswa->user_id = $user->id;
        $siswa->lokal_id = $validasi['lokal_id'];
        $siswa->save();
        return redirect(route('siswa.index'));
    }

    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa.view', [
            'menu' => 'siswa',
            'title' => 'Detail Data siswa',
            'siswa' => $siswa
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::with('lokal')->find($id);
        $kelas = lokal::all();
        return view('admin.siswa.edit', [
            'menu' => 'siswa',
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nisn' => 'nullable',
            'nama' => 'nullable',
            'alamat' => 'required',
            'telp' => 'nullable',
            'jk' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'user_id' => 'nullable',
            'lokal_id' => 'nullable'
        ]);


        $siswa = siswa::find($id);
        $siswa->nisn = $validasi['nisn'] ?? $siswa->nisn;
        $siswa->nama = $validasi['nama'] ?? $siswa->nama;
        $siswa->alamat = $validasi['alamat'] ?? $siswa->alamat;
        $siswa->telp = $validasi['telp'] ?? $siswa->telp;
        $siswa->jk = $validasi['jk'] ?? $siswa->jk;
        $siswa->username = $validasi['username'] ?? $siswa->username;
        if ($request->filled('password')) {
            $siswa->password = $validasi['password'];
        }
        $siswa->user_id = $validasi['user_id'] ?? $siswa->user_id;
        $siswa->lokal_id = $validasi['lokal_id'] ?? $siswa->lokal_id;
        $siswa->save();

        return redirect(route('siswa.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect(route('siswa.index'));
    }
}



