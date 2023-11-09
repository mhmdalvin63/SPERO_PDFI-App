<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "bidangs";
    protected $fillable = [
        'nama', 'deskripsi',
    ];

    public function organisasi(){
        return $this->hasMany(Organisasi::class, 'id_bidang');
    }
}
