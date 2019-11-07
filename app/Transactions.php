<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //Table Name
    protected $table = 'transactions';

    // Setup fields of table "posts"
    protected $fillable = ['id', 'type_id', 'student_id', 'debit','kredit', 'terbilang', 'created_at'];

     // Relation category to foreign key 
     public function students() {
        return $this->belongsTo('App\students','nis');
    }
    

}
