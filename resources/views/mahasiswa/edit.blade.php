@extends('layouts.master')

@section('title', 'Edit Mahasiswa')
@section('judul', 'Edit Mahasiswa')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if ($mahasiswa)
                <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->nama }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="{{ $mahasiswa->jurusan }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $mahasiswa->alamat }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tingkat</label>
                        <input type="text" class="form-control" name="tingkat" value="{{ $mahasiswa->tingkat }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </form>
            @else
                <p>Data mahasiswa tidak ditemukan.</p>
            @endif
        </div>
    </div>
@endsection
