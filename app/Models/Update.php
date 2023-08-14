<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Update extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "updates";
    protected $fillable = [
        'judul_update','isi_berita', 'foto'
    ];

    public function tag(){
        return $this->BelongsToMany(Tag::class, 'update_tags', 'id_update', 'id_tag');
    }
}
