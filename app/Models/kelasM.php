<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelasM extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
       'id','namakelas'
    ];

    public function siswa()
    {
        return $this->hasMany(siswaM::class);
    }
}
