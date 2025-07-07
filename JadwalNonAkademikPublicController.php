<?php

namespace App\Http\Controllers;

use App\Models\JadwalNonAkademik;

class JadwalNonAkademikPublicController extends Controller
{
    public function index()
    {
        $jadwal = JadwalNonAkademik::all();
        return view('jadwal_non_akademik', compact('jadwal'));
    }
} 