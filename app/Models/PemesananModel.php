<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesananModel extends Model
{
    use HasFactory;
    protected $table        = "pemesanan";
    protected $primaryKey   = "id_pemesanan";
    protected $fillable     = ['id_pemesanan','id_petugas','id_masyarakat','id_konser'];

    //relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'id_petugas');
    }

    //relasi ke masyarakat
    public function masyarakat()
    {
        return $this->belongsTo('App\Models\MasyarakatModel', 'id_masyarakat');
    }

    //relasi ke konser
    public function konser()
    {
        return $this->belongsTo('App\Models\KonserModel', 'id_konser');
    }
}