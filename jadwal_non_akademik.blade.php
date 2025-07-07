@extends('layouts.app')
@section('content')
    <h2>Manajemen Jadwal Non-Akademik</h2>
    <a href="{{ route('manajemen.jadwal-non-akademik.create') }}" class="btn btn-primary mb-3">Tambah Jadwal Non-Akademik</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Lokasi</th>
                <th>Penanggung Jawab</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwal as $item)
            <tr>
                <td>{{ $item->nama_kegiatan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jam }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>{{ $item->penanggung_jawab }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('manajemen.jadwal-non-akademik.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('manajemen.jadwal-non-akademik.destroy', $item->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center">Belum ada jadwal non-akademik.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 