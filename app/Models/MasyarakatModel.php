<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masyarakatModel extends Model
{
    use HasFactory;
    protected $table        = "masyarakat";
    protected $primaryKey   = "id_masyarakat";
    protected $fillable     = ['id_masyarakat','nik','nama_peserta','email','hp'];
}