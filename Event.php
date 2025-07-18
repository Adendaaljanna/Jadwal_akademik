<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'tanggal', 'status'
    ];

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
} 