@extends('layouts.app')
@section('content')
    <h2>Manajemen Mata Kuliah</h2>
    <a href="{{ route('manajemen.matakuliah.create') }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matakuliah as $mk)
            <tr>
                <td>{{ $mk->kode }}</td>
                <td>{{ $mk->nama }}</td>
                <td>{{ $mk->sks }}</td>
                <td>
                    <a href="{{ route('manajemen.matakuliah.edit', $mk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('manajemen.matakuliah.destroy', $mk->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center">Belum ada mata kuliah.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 