@extends('layouts.app')
@section('content')
    <h2>Manajemen Event Perkuliahan</h2>
    <a href="{{ route('manajemen.event.create') }}" class="btn btn-primary mb-3">Tambah Event</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Event</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr>
                <td>{{ $event->nama }}</td>
                <td>{{ $event->tanggal }}</td>
                <td>{{ $event->status }}</td>
                <td>
                    <a href="{{ route('manajemen.event.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('manajemen.event.destroy', $event->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                    <form action="{{ route('event.daftar', $event->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Daftar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center">Belum ada event.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 