<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['id_mahasiswa', 'id_bank'];
    public function mahasiswa () {
        return $this->belongsTo('App\Mahasiswa', 'id_mahasiswa');
    }

    public function matakuliah () {
        return $this->belongsTo('App\matakuliah', 'id_bank');
    }
}
