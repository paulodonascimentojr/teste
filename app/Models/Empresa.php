<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    //protected $filable = ['nome'];
    protected $guarded = [];  

    public function empresas(){
        return $this->belongsToMany('App\Models\Cliente');
    }
}