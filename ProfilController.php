<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'alamat' => 'nullable|string|max:255',
                'foto' => 'nullable|image|max:2048',
            ]);
            if ($request->hasFile('foto')) {
                if ($user->foto) Storage::delete($user->foto);
                $data['foto'] = $request->file('foto')->store('foto_profil', 'public');
            }
            $user->update($data);
            return back()->with('success', 'Profil berhasil diperbarui.');
        }
        return view('profil', compact('user'));
    }
} 