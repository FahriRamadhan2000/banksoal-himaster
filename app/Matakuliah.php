<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    //to force model to read bank table
    protected $table = 'bank';
    //only this object which can fill into table
    protected $fillable = ['matakuliah', 'semester', 'type', 'url'];
    //created_at and updated_at column are disable to fill
    public $timestamps = false;

    //create relationship to report table with id_bank as foreign key
    public function report () {
        return $this->hasMany('App\Report', 'id_bank');
    }
}
