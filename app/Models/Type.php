<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "types";
    protected $fillable = [
        'nama_tipe'
    ];

    
    public function tipeagenda(){
        return $this->BelongsToMany(TypeAgenda::class, 'id_type');
    }
}
