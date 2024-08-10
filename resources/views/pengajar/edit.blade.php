@extends('layouts.master')

@section('title', 'Edit Pengajar')
@section('judul', 'Edit Pengajar')

@section('bc')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Data Pengajar</a></li>
        <li class="breadcrumb-item active">Edit Pengajar</li>
    </ol>
@endsection

@section('content')
    <form action="{{ route('pengajar.update', $pengajar->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Pengajar</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', isset($pengajar) ? $pengajar->nama : '') }}" required>
                </div>
                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="{{ old('mata_pelajaran', isset($pengajar) ? $pengajar->mata_pelajaran : '') }}" required>
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', isset($pengajar) ? $pengajar->no_hp : '') }}">
                </div>                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
