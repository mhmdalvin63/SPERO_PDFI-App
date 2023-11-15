<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "organisasis";
    protected $fillable = [
        'nama','foto', 'id_posisi', 'domisili', 'id_bidang'
    ];

    public function bidang(){
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }

    public function posisi(){
        return $this->belongsTo(Posisi::class, 'id_posisi');
    }

    public function dewan(){
        return $this->belongsTo(Dewan::class, 'id_dewan');
    }

    public function koordinator(){
        return $this->belongsTo(Koordinator::class, 'id_koordinator');
    }
}
