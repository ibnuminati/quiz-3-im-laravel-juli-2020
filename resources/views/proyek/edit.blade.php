@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="card p-3">
                <form method="post" action="/pertanyaan/{{$p->id}}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_proyek">Nama Proyek</label>
                        <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" id="nama_proyek" placeholder="nama_proyek" name="nama_proyek" value="{{$p->nama_proyek}}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Isi</label>
                        <textarea type="text" class="form-control @error('deskripsi) is-invalid @enderror" id="deskripsi" placeholder="deskripsi" name="deskripsi">{{$p->deskripsi}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection