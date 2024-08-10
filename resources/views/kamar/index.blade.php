@extends('layouts.master')

@section('title', 'Data Kamar')
@section('judul', 'Data Kamar')

@section('bc')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Data Kamar</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kamar.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kamar</th>
                        <th>Tingkat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kamars as $kamar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kamar->nama_kamar }}</td>
                            <td>{{ $kamar->tingkat ?? 'N/A' }}</td>
                            <td>

                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#viewModal{{ $kamar->id }}">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Modal View -->
                                <div class="modal fade" id="viewModal{{ $kamar->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $kamar->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel{{ $kamar->id }}">Detail Kamar</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered">   
                                                    <tr>
                                                        <th>Nama Kamar</th>
                                                        <td>{{ $kamar->nama_kamar }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tingkat</th>
                                                        <td>{{ $kamar->tingkat }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i></a>

                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{ $kamar->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="hapus{{ $kamar->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Peringatan</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin menghapus kamar <b>{{ $kamar->nama_kamar }}</b>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('kamar.destroy', $kamar->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
