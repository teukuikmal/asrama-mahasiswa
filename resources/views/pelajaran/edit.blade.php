@extends('layouts.master')

@section('title', 'Edit Pelajaran')
@section('judul', 'Edit Pelajaran')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pelajaran.update', $pelajaran->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" value="{{ old('mata_pelajaran', $pelajaran->mata_pelajaran) }}" required>
                </div>
                <div class="form-group">
                    <label for="pengajar">Pengajar</label>
                    <select name="pengajar" id="pengajar" class="form-control" required>
                        <option value="">Pilih Pengajar</option>
                        @foreach($pengajars as $pengajar)
                            <option value="{{ $pengajar->id }}" {{ $pengajar->id == $pelajaran->pengajar_id ? 'selected' : '' }}>{{ $pengajar->nama_pengajar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tingkat">Tingkat</label>
                    <select name="tingkat" id="tingkat" class="form-control" required>
                        <option value="">Pilih Tingkat</option>
                        @foreach($tingkats as $tingkat)
                            <option value="{{ $tingkat }}" {{ $tingkat == $pelajaran->tingkat ? 'selected' : '' }}>{{ $tingkat }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
