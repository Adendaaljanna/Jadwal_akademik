@extends('layouts.app')
@section('content')
    <h2>Manajemen UKM</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama UKM</th>
                <th>Pembina</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ukms as $ukm)
            <tr>
                <td>{{ $ukm['nama'] }}</td>
                <td>{{ $ukm['pembina'] }}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="text-center">Belum ada UKM.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tombol Tambah UKM -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUkmModal">
        Tambah UKM
    </button>

    <!-- Modal/Form Tambah UKM -->
    <div class="modal fade" id="tambahUkmModal" tabindex="-1" aria-labelledby="tambahUkmModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="{{ route('manajemen.ukm.store') }}" method="POST">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahUkmModalLabel">Tambah UKM</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="nama_ukm" class="form-label">Nama UKM</label>
                <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" required>
              </div>
              <div class="mb-3">
                <label for="pembina" class="form-label">Pembina</label>
                <input type="text" class="form-control" id="pembina" name="pembina" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
@endsection 