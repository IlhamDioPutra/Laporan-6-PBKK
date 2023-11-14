<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table= "matkul";
    protected $primarykey = "id";
    protected $fillable = ['kode_matkul', 'nama_matkul'];

    // public function jadwal(){
    //     return $this->hasMany(Jadwal::class);
    // }
}
