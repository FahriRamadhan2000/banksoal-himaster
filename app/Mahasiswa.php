<?php

namespace App;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class Mahasiswa extends User
{
    //to force model to read mahasiswa table
    protected $table = 'mahasiswa';
    //only this object which can fill into table
    protected $fillable = ['nama', 'nim', 'angkatan', 'password'];
    //created_at and updated_at column are disable to fill
    public $timestamps = false;

    //auth password with hash because password in table have not hash before
    public function getAuthPassword()
    {
        return Hash::make($this->password);
    }

    //create relationship to report table with id_mahasiswa as foreign key
    public function report () {
        return $this->hasMany('App\Report', 'id_mahasiswa');
    }
}
