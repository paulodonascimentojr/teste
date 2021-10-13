<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLegends\EloquentFilter\HasFilter;

class Cliente extends Model
{
    use HasFactory;
    //protected $filable = ['nome'];
    protected $filable = ['cep'];
    protected $guarded = [];  

    public function clientes(){
        return $this->belongsTo('App\Model\Empresa');
    }
}
