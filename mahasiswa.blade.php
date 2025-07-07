@extends('layouts.app')
@section('content')
    <h2>Daftar Mahasiswa</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs['nama'] }}</td>
                <td>{{ $mhs['nim'] }}</td>
                <td>{{ $mhs['prodi'] }}</td>
            </tr>
            @empty
            <tr><td colspan="3" class="text-center">Belum ada data mahasiswa.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 