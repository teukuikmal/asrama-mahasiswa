<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;

    protected $fillable = ['mata_pelajaran', 'pengajar_id', 'tingkat'];

    // Relasi dengan model Pengajar
    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id');
    }
}
