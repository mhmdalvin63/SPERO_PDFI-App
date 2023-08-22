<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "indonesia_cities";
    protected $fillable = [
        'code','name', 'meta', 'province_code'
    ];

    
    public function pendaftar(){
        return $this->hasMany(Pendaftar::class, 'id_kota');
    }
}
