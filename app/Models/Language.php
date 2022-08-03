<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //la tabla conectar 
    protected $table = "languages";
    //la clave primaria de esa tabla 
    protected $primaryKey = "language_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //M to M Language - country
    //relationship
    public function paises(){
        //belongsToMany
        //1. Related Model
        //2. pivot table(intermediate table)
        //3. Foreign Key of current model
        //4. Foreign Key of related model
        return $this->belongsToMany(Country::class , 
                        'country_languages' , 
                        'language_id', 
                        'country_id');
    }
}
