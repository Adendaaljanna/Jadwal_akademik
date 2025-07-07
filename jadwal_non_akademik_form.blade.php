@extends('layouts.app')
@section('content')
    <h2>{{ isset($jadwal) ? 'Edit' : 'Tambah' }} Jadwal Non-Akademik</h2>
    <form method="POST" action="{{ isset($jadwal) ? route('manajemen.jadwal-non-akademik.update', $jadwal->id) : route('manajemen.jadwal-non-akademik.store') }}">
        @csrf
        @if(isset($jadwal))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label class="form-label">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', $jadwal->nama_kegiatan ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $jadwal->tanggal ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jam</label>
            <input type="time" name="jam" class="form-control" value="{{ old('jam', $jadwal->jam ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $jadwal->lokasi ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Penanggung Jawab</label>
            <input type="text" name="penanggung_jawab" class="form-control" value="{{ old('penanggung_jawab', $jadwal->penanggung_jawab ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ old('keterangan', $jadwal->keterangan ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('manajemen.jadwal-non-akademik.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection 