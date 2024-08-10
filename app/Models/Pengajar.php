<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pengajar', 'mata_pelajaran', 'no_hp'];

    public function pelajarans()
    {
        return $this->hasMany(Pelajaran::class, 'pengajar_id');
    }
}
