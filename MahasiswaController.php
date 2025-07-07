<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = \App\Models\User::where('role', 'mahasiswa')->get();
        return view('mahasiswa', compact('mahasiswa'));
    }
} 