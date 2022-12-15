<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archivo extends Model
{

    use HasFactory;
    protected $fillable = ['url','name','extencion'];

        //relacion invertida n-1 con departamento
        public function categoria()
        {
            return $this->belongsTo('App\Models\categoria');
        }
        public function users()
        {
            return $this->belongsToMany('App\Models\user');
        }



}
