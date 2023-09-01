<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoAgenda extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "foto_agendas";
    protected $fillable = [
        'foto','id_agenda'
    ];

    public function agenda(){
        return $this->BelongsTo(Agenda::class, 'id_agenda');
    }
}
