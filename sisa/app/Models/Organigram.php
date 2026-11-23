<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organigram extends Model
{
    use HasFactory;

    protected $table = 'tabel_organigram';

    protected $primaryKey = 'id_organigram';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'gambar',
        'jabatan',
    ];
}