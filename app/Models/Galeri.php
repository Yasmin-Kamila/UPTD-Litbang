<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'tabel_galeri';

    protected $primaryKey = 'id_galeri';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'gambar',
        'tanggal',
    ];
}