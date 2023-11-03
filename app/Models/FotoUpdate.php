<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoUpdate extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "foto_updates";
    protected $fillable = [
        'foto','id_update'
    ];

    public function upd(){
        return $this->BelongsTo(Update::class, 'id_update');
    }
}
