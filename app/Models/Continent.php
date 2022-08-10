<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //la tabla conectar 
    protected $table = "continents";
    //la clave primaria de esa tabla 
    protected $primaryKey = "continent_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //relacion entre continente y sus regiones
    public function regiones(){
        //Parameters
        // 1. Linked model
        // 2. Foreign key of current model into related model region
        return $this->hasMany(Region::class, 'continent_id');
    }

    public function paises(){
        //Parameters
        // 1. nieto
        // 2. papá
        // 3. FK del abuelo en el papá
        // 4. FK del papa en el nieto
        return $this->hasManyThrough (Country::class, Region::class, 'continent_id', 'region_id');
}
}