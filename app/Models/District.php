<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "indonesia_districts";
    protected $fillable = [
        'code','name', 'meta', 'city_code '
    ];

    
    public function pendaftar(){
        return $this->hasMany(Pendaftar::class, 'id_kecamatan');
    }
}
