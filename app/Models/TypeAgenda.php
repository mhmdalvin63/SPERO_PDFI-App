<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAgenda extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "type_agendas";
    protected $fillable = [
        'id_agenda', 'id_type'
    ];
    

}
