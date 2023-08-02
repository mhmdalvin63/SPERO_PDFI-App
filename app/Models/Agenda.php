<?php

namespace App\Models;

use App\Models\Tiket;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "agendas";
    protected $fillable = [
        'judul_agenda','deskripsi', 'start_date', 'end_date', 'location', 'id_anggota', 'foto'
    ];

    public function anggota(){
        return $this->hasMany(Anggota::class, 'id_anggota');
    }

    public function tiket(){
        return $this->BelongsTo(Tiket::class, 'id_agenda');
    }

    public function tipeagenda(){
        return $this->BelongsToMany(TypeAgenda::class, 'id_agenda');
    }
}
