<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $dataguru = Guru::all();
        return view('admin.guru.index', [
            'menu' => 'guru',
            'title' => 'Data Guru',
            'dataguru' => $dataguru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create', [
            'menu' => 'guru',
            'title' => 'Tambah Data Guru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jk' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_id' => 'nullable',
        ], [
            'nip.required' => 'NIP Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'telp.required' => 'Nomor HP Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);
        
        $user = new User();
        $user->name = 'Guru';
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'guru';
        $user->save();


        $guru = new Guru;
        $guru->nip = $validasi['nip'];
        $guru->nama = $validasi['nama'];
        $guru->alamat = $validasi['alamat'];
        $guru->telp = $validasi['telp'];
        $guru->jk = $validasi['jk'];
        $guru->username = $validasi['username'];
        $guru->password = bcrypt($validasi['password']);
        $guru->user_id = $user->id;
        $guru->save();
        return redirect(route('guru.index'));
    }

    public function show($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.view', [
            'menu' => 'guru',
            'title' => 'Detail Data Guru',
            'guru' => $guru
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.edit', [
            'menu' => 'guru',
            'title' => 'Edit Data Guru',
            'guru' => $guru
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nip' => 'nullable',
            'nama' => 'nullable',
            'alamat' => 'required',
            'telp' => 'nullable',
            'jk' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'user_id' => 'nullable',
        ]);


        $guru = Guru::find($id);
        $guru->nip = $validasi['nip'] ?? $guru->nip;
        $guru->nama = $validasi['nama'] ?? $guru->nama;
        $guru->alamat = $validasi['alamat'] ?? $guru->alamat;
        $guru->telp = $validasi['telp'] ?? $guru->telp;
        $guru->jk = $validasi['jk'] ?? $guru->jk;
        $guru->username = $validasi['username'] ?? $guru->username;
        if ($request->filled('password')) {
            $guru->password = $validasi['password'];
        }
        $guru->user_id = $validasi['user_id'] ?? $guru->user_id;
        $guru->save();

        return redirect(route('guru.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();
        return redirect(route('guru.index'));
    }
}

