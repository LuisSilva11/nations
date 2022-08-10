<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //la tabla conectar 
    protected $table = "countries";
    //la clave primaria de esa tabla 
    protected $primaryKey = "country_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //Many to Many Country - Language
    //relationship
    public function languages(){
        //belongsToMany
        //1. Related Model
        //2. pivot table(intermediate table)
        //3. Foreign Key of current model
        //4. Foreign Key of related model
        return $this->belongsToMany(Language::class , 
                        'country_languages' , 
                        'country_id', 
                        
                        'language_id')->withPivot('official');
    }

    //M:1 country - region
    //relationship
    public function regions(){
        //Beolongs To method: Parameters
        //1. Related model
        //2. Foreing key related model in current model
        return $this->belongsTo(Region::class , 'region_id');
    }


}
