<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table= "ruangan";
    protected $primarykey = "id";
    protected $fillable = ['ruangan'];

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

}
