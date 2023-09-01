<?php

namespace App\Models;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "types";
    protected $fillable = [
        'nama_tipe'
    ];

    
    public function agenda(){
        return $this->BelongsToMany(Agenda::class, 'type_agendas', 'id_type', 'id_agenda');
    }

    public function user(){
        return $this->BelongsTo(User::class, 'id_user');
    }

}
