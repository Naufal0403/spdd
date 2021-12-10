<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'id_user',
        'judul',
        'isi',
        'gambar',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
