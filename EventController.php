<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = \App\Models\Event::all();
        return view('event', compact('events'));
    }

    public function daftar($id)
    {
        $user = auth()->user();
        $event = \App\Models\Event::findOrFail($id);

        if ($event->users()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar di event ini.');
        }

        $event->users()->attach($user->id);

        return redirect()->back()->with('success', 'Berhasil mendaftar event!');
    }
} 