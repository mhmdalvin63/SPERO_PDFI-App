<?php

namespace App\Models;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiket extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "tikets";
    protected $fillable = [
        'id_agenda','nama_tiket', 'harga_tiket'
    ];

    public function agenda(){
        return $this->belongsTo(Agenda::class, 'id_agenda');
    }
    public function pendaftar(){
        return $this->hasMany(Agenda::class, 'id_tiket');
    }
}
