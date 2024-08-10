@extends('layouts.master')

@section('title', 'Tambah Kamar')
@section('judul', 'Tambah Kamar')

@section('bc')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Data Kamar</a></li>
        <li class="breadcrumb-item active">Tambah Kamar</li>
    </ol>
@endsection

@section('content')
    <form action="{{ route('kamar.store') }}" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Kamar</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_kamar">Nama Kamar</label>
                    <input type="text" class="form-control" id="nama_kamar" name="nama_kamar" value="{{ old('nama_kamar') }}" required>
                </div>
                <div class="form-group">
                    <label for="tingkat">Tingkat</label>
                    <select class="form-control" id="tingkat" name="tingkat" required>
                        <option value="">Pilih Tingkat</option>
                        @foreach($tingkats as $tingkat)
                            <option value="{{ $tingkat }}">{{ $tingkat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
