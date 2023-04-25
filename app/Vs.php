<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vs extends Model
{
    //Nos aseguramos que toca los datos de la base de datos con la tabla Vs
    //table name 
    protected $table = 'vs';
    // Primy key
    public $primaryKey = 'id';
    //timestaps
    public $timestamps = true;
}

