<?php

namespace App\Models;


use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Type;
use App\Models\Tiket;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;
    use HasSlug;
    protected $primaryKey = "id";
    protected $table = "agendas";
    protected $fillable = [
        'judul_agenda','deskripsi', 'link_gform', 'slug', 'start_date', 'end_date', 'location', 'id_anggota', 'foto', 'status_event'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul_agenda')
            ->saveSlugsTo('slug');
    }

    public function anggota(){
        return $this->BelongsTo(Anggota::class, 'id_anggota');
    }

    public function user(){
        return $this->BelongsTo(User::class, 'id_user');
    }

    public function tiket(){
        return $this->hasMany(Tiket::class, 'id_agenda');
    }

    public function pendaftar(){
        return $this->hasMany(Pendaftar::class, 'id_agenda');
    }

    public function foto(){
        return $this->hasMany(FotoAgenda::class, 'id_agenda');
    }

    public function type(){
        return $this->BelongsToMany(Type::class, 'type_agendas', 'id_agenda', 'id_type');
    }
}
