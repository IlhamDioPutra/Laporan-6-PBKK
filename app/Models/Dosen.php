<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table= "dosen";
    protected $primarykey = "id";
    protected $fillable = ['nip', 'nama_dosen'];

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
}
