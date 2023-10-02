<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "pendaftars";
    protected $fillable = [
        'id_user','name', 'bukti_keanggotaan', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_telp', 'foto', 'email', 'no_anggota_idi', 'no_anggota_pdfi', 'bukti_transfer', 'cabang', 'id_agenda', 'id_tiket', 'id_provinsi', 'id_kota', 'kecamatan', 'token', 'status'
    ];

    public function agenda(){
        return $this->BelongsTo(Agenda::class, 'id_agenda');
    }

    public function user(){
        return $this->BelongsTo(User::class, 'id_user');
    }

    public function tiket(){
        return $this->BelongsTo(Tiket::class, 'id_tiket');
    }

    public function provinsi(){
        return $this->BelongsTo(Province::class, 'id_provinsi');
    }

    public function kota(){
        return $this->BelongsTo(City::class, 'id_kota');
    }

    public function kecamatan(){
        return $this->BelongsTo(District::class, 'id_kecamatan');
    }
}
