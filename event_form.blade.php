@extends('layouts.app')
@section('content')
    <h2>{{ isset($event) ? 'Edit' : 'Tambah' }} Event Perkuliahan</h2>
    <form method="POST" action="{{ isset($event) ? route('manajemen.event.update', $event->id) : route('manajemen.event.store') }}">
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label class="form-label">Nama Event</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $event->nama ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $event->tanggal ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif" {{ old('status', $event->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $event->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('manajemen.event.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection 