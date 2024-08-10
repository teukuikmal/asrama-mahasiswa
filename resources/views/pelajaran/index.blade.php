@extends('layouts.master')

@section('title', 'Data Pelajaran')
@section('judul', 'Data Pelajaran')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pelajaran.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Pengajar</th>
                        <th>Tingkat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelajarans as $pelajaran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelajaran->mata_pelajaran }}</td>
                            <td>{{ $pelajaran->pengajar }}</td>
                            <td>{{ $pelajaran->tingkat }}</td>
                            <td>

                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#viewModal{{ $pelajaran->id }}">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Modal View -->
                                <div class="modal fade" id="viewModal{{ $pelajaran->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $pelajaran->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel{{ $pelajaran->id }}">Detail Pelajaran</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered">   
                                                    <tr>
                                                        <th>Mata Pelajaran</th>
                                                        <td>{{ $pelajaran->mata_pelajaran }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pengajar</th>
                                                        <td>{{ $pelajaran->pengajar }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tingkat</th>
                                                        <td>{{ $pelajaran->tingkat }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('pelajaran.edit', $pelajaran->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i></a>
                                <form action="{{ route('pelajaran.destroy', $pelajaran->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
