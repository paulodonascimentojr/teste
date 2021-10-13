<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function search(Request $request){
        dd('a');
        $search = $request->all();
        $clientes = Cliente::where(function($query) use ($search){
            if(count($search)){
                $query->where($search['column'], $search['filter']);
            }
        })->paginate($this->total);
    }
}
