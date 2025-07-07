@extends('layouts.app')
@section('content')
    <h2>{{ isset($matakuliah) ? 'Edit' : 'Tambah' }} Mata Kuliah</h2>
    <form method="POST" action="{{ isset($matakuliah) ? route('manajemen.matakuliah.update', $matakuliah->id) : route('manajemen.matakuliah.store') }}">
        @csrf
        @if(isset($matakuliah))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ old('kode', $matakuliah->kode ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $matakuliah->nama ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">SKS</label>
            <input type="number" name="sks" class="form-control" value="{{ old('sks', $matakuliah->sks ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('manajemen.matakuliah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection 