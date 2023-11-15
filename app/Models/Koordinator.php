<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "koordinators";
    protected $fillable = [
        'nama',
    ];

    public function organisasi(){
        return $this->hasMany(Organisasi::class, 'id_koordinator');
    }
}
