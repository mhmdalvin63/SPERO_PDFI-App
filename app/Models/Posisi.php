<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "posisis";
    protected $fillable = [
        'posisi','tingkatan',
    ];

    public function organisasi(){
        return $this->hasMany(Organisasi::class, 'id_posisi');
    }
}
