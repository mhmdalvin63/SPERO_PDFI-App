<?php

namespace App\Models;

use App\Models\Type;
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
        'judul_agenda','deskripsi', 'start_date', 'end_date', 'location', 'id_anggota', 'foto', 'status_event'
    ];

    public function anggota(){
        return $this->BelongsTo(Anggota::class, 'id_anggota');
    }

    public function tiket(){
        return $this->hasMany(Tiket::class, 'id_agenda');
    }

    public function pendaftar(){
        return $this->hasMany(Pendaftar::class, 'id_agenda');
    }

    public function type(){
        return $this->BelongsToMany(Type::class, 'type_agendas', 'id_agenda', 'id_type');
    }
}
