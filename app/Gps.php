<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    //Nos aseguramos que toca los datos de la base de datos con la tabla gps
    //table name 
    protected $table = 'gps';
    // Primy key
    public $primaryKey = 'id';
    //timestaps
    public $timestamps = true;
}

