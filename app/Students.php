<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';

    // Setup fields of table "category"
    protected $fillable = ['id', 'name', 'grade_id', 'nis', 'nisn'];

    //Model Relationships
    public function posts() 
    {
        return $this->hasMany('App\transactions');
    }

}
