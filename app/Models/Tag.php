<?php

namespace App\Models;

use App\Models\Update;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "tags";
    protected $fillable = [
        'tag_name','deskripsi'
    ];

    public function upd(){
        return $this->BelongsToMany(Update::class, 'update_tags', 'id_tag', 'id_update');
    }
}
