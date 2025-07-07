@extends('layouts.app')
@section('content')
    <h2>{{ isset($jadwal) ? 'Edit' : 'Tambah' }} Jadwal</h2>
    <form method="POST" action="{{ isset($jadwal) ? route('manajemen.jadwal.update', $jadwal->id) : route('manajemen.jadwal.store') }}">
        @csrf
        @if(isset($jadwal))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label class="form-label">Hari</label>
            <select name="hari" class="form-control" required>
                <option value="">Pilih Hari</option>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                    <option value="{{ $hari }}" {{ old('hari', $jadwal->hari ?? '') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                @endforeach
            </select>
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
            <label class="form-label">Mata Kuliah</label>
            <input type="text" name="matakuliah" class="form-control" value="{{ old('matakuliah', $jadwal->matakuliah ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Dosen</label>
            <input type="text" name="dosen" class="form-control" value="{{ old('dosen', $jadwal->dosen ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ruangan</label>
            <input type="text" name="ruangan" class="form-control" value="{{ old('ruangan', $jadwal->ruangan ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('manajemen.jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection 