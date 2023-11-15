<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $primarykey = "id";
    protected $fillable = ['matkul_id','dosen_id','ruangan_id', 'hari','jam_mulai','jam_selesai'];

    public function ruangan(){
        return $this->belongsTo(Ruangan::class);
    }

    public function matkul(){
        return $this->belongsTo(Matkul::class);
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class);
    }


}
