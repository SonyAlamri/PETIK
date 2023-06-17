<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konserModel extends Model
{
    use HasFactory;
    protected $table        = "konser";
    protected $primaryKey   = "id_konser";
    protected $fillable     = ['id_konser','kode_konser','judul','band','kategori'];
}