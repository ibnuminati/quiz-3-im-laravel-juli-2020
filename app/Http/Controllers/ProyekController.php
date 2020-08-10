<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Date;

class ProyekController extends Controller
{
    public function index()
    {
        $title = 'Data Proyek';
        $pertanyaan = DB::table('proyeks')->get();
        return view('proyek.index', compact('title', 'proyek'));
    }

    
    public function create()
    {
        $title = 'Tambah Proyek';
        return view('proyek.create', compact('title'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'nama proyek' => 'required',
            'deskripsi' => 'required'
        ]);

        DB::table('pertanyaan')->insert([
            'nama proyek' => $request->nama_proyek,
            'deskripsi' => $request->deskripsi,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        return redirect('/proyek')->with('status', 'Proyek Berhasil Ditambahkan!');
    }

 
    public function show($id)
    {
        $title = 'Detail Proyek';
        $p = DB::table('proyek')->where('id', $id)->first();
        return view('proyek.show', compact('title', 'p'));
    }

    public function edit($id)
    {
        $title = 'Perbaharui Proyek';
        $p = DB::table('proyek')->where('id', $id)->first();
        return view('prpyek.edit', compact('title', 'p'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama proyek' => 'required',
            'deskripsi' => 'required'
        ]);

        DB::table('proyek')->where('id', $id)->update([
            'nama proyek' => $request->nama_proyek,
            'deskripsi' => $request->deskripsi,
            'updated_at' => new DateTime()
        ]);

        return redirect('/proyek')->with('status', 'Proyek Berhasil Diperbaharui!');
    }

    public function destroy($id)
    {
        DB::table('proyek')->where('id', $id)->delete();

        return redirect('/proyek')->with('status', 'Proyek berhasil dihapus');
    }
}
