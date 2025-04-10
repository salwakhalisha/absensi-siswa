<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan  = jurusan::all();
        return view('jurusan.index', 
        [
            "menu" => "jurusan"
            , "jurusan" => $jurusan
        ]);
    }

    public function create()
    {
        return view('jurusan.create', 
        [
            "menu"=> "jurusan"
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
        ]);

        $data_baru = new jurusan();
        $data_baru->nama = $validasi['nama'];
        $data_baru->save();

        return redirect()->route('jurusan.index');
    }

    public function edit($id)
    {
        $jurusan = jurusan::find($id);
        return view('jurusan.edit', 
        [
            "menu" => "jurusan"
            , "jurusan" => $jurusan
        ]);
    }

    public function update()
    {
        $validasi =request()->validate([
            'id' => 'required',
            'nama' => 'required',
        ]);

        $jurusan = jurusan::find($validasi['id']);
        $jurusan->nama = $validasi['nama'];
        $jurusan->save();

        return redirect()->route('jurusan.index');
    }
    public function destroy($id)
    {
        $jurusan = jurusan::find($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index');
    }
}
