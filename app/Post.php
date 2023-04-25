<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name 
    protected $table = 'posts';
    // Primy key
    public $primaryKey = 'id';
    //timestaps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
