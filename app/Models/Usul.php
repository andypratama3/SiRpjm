<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usul extends Model
{
    use HasFactory;

    protected $table = 'usuls';

    protected $fillable = [
        'name',
        'lokasi',
        'volume',
        'satuan',
        'status',
        'user_id',
        'biaya',
        'tahun_prioritas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
