<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Update extends Model
{
    use HasFactory;
    use HasSlug;
    protected $primaryKey = "id";
    protected $table = "updates";
    protected $fillable = [
        'judul_update','isi_berita', 'jenis_berita', 'slug'
    ];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul_update')
            ->saveSlugsTo('slug');
    }

    public function tag(){
        return $this->BelongsToMany(Tag::class, 'update_tags', 'id_update', 'id_tag');
    }

    public function foto(){
        return $this->hasMany(FotoUpdate::class, 'id_update');
    }

    public function user(){
        return $this->BelongsToMany(User::class, 'like_updates', 'id_update', 'id_user');
    }
}
