<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UKM;

class UKMController extends Controller
{
    public function index()
    {
        $ukms = UKM::all();
        return view('ukm', compact('ukms'));
    }
} 