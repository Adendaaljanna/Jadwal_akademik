@extends('layouts.app')
@section('content')
    <h2>Manajemen Jadwal</h2>
    <a href="{{ route('manajemen.jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwal as $item)
            <tr>
                <td>{{ $item->hari }}</td>
                <td>{{ $item->jam }}</td>
                <td>{{ $item->matakuliah }}</td>
                <td>{{ $item->dosen }}</td>
                <td>{{ $item->ruangan }}</td>
                <td>
                    <a href="{{ route('manajemen.jadwal.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('manajemen.jadwal.destroy', $item->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">Belum ada jadwal.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 