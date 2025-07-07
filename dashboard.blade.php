@extends('layouts.app')
@section('content')
    <h1>Selamat Datang, {{ $user->name }}</h1>
    <p>Role: {{ $user->role }}</p>
    <div class="alert alert-info">
        <strong>Hari Ini:</strong> {{ $hariIni }}
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Hari Ini</h5>
                    @if(isset($jadwalHariIni) && $jadwalHariIni->count())
                        <ul class="list-unstyled mb-0">
                            @foreach($jadwalHariIni as $jadwal)
                                <li>
                                    <strong>{{ $jadwal->matakuliah }}</strong> ({{ $jadwal->jam }})<br>
                                    Dosen: {{ $jadwal->dosen }}, Ruang: {{ $jadwal->ruangan }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>-</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Event Aktif</h5>
                    @if(isset($eventAktif) && $eventAktif->count())
                        <ul class="list-unstyled mb-0">
                            @foreach($eventAktif as $event)
                                <li>
                                    <strong>{{ $event->nama }}</strong> ({{ $event->tanggal }})
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>-</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h4>Jadwal Non Akademik</h4>
        @if(isset($jadwalNonAkademik) && $jadwalNonAkademik->count())
            <div class="row">
                @foreach($jadwalNonAkademik as $jadwal)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title mb-1">{{ $jadwal->nama_kegiatan }}</h5>
                                <span class="badge bg-info text-dark mb-2">
                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}
                                </span>
                                <ul class="list-unstyled mb-0">
                                    <li><strong>Jam:</strong> {{ $jadwal->jam }}</li>
                                    <li><strong>Lokasi:</strong> {{ $jadwal->lokasi }}</li>
                                    <li><strong>PJ:</strong> {{ $jadwal->penanggung_jawab }}</li>
                                    @if($jadwal->keterangan)
                                        <li><strong>Keterangan:</strong> {{ $jadwal->keterangan }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">Belum ada jadwal non akademik.</p>
        @endif
    </div>
@endsection 