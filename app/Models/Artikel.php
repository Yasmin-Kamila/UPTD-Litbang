<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'tabel_artikel';

    protected $primaryKey = 'id_artikel';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'gambar',
    ];
}