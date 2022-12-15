<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;


    //relacion invertida n-1 con departamento
    public function departamento()
    {
        return $this->belongsTo('App\Models\departamento');
    }
   // relacion con archivos 1- n
    public function archivos()
    {
        return $this->hasMany('App\Models\archivo');
    }
    //relacion con usuarios n -n 
    public function users()
    {
        return $this->belongsToMany('App\Models\user');
    }


}
