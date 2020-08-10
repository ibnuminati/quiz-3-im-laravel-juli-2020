@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <!-- <div class="row"> -->
        <div class="mt-3 ml-3">
            <div class="card p-3">
                <form method="post" action="/proyek">
                    @csrf
                    <div class="form-group">
                        <label for="nama_proyek">Nama Proyek</label>
                        <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" id="judul" placeholder="nama_proyek" name="nama_proyek" value="{{old('nama_proyek')}}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection