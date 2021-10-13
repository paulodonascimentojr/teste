<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private int $totalPage = 10;

    public function index(Request $request)
    {
        
        $clientes = Cliente::latest()->paginate($this->totalPage);
        $empresas = Empresa::orderBy('nome')->get();
        return view('clientes.index', compact('clientes','empresas'));


       ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $empresas = Empresa::orderBy('nome')->get();
        
        return view('clientes.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        /*$request->validate([
            'nome' => 'required',
        ]);*/
        Cliente::create($request->all());

        return redirect()->route('clientes.index')
                        ->with('success','Cliente cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        
        $empresas = Empresa::orderBy('nome')->get();
        return view('clientes.edit',compact('cliente', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
                        ->with('success','Cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success','Cliente excluido com sucesso');
    }

    public function search(Request $request){
        $search = $request->all();
        $clientes = Cliente::where(function($query) use ($search){
            if(count($search)){
                $query->where('nome', 'like',"%{$search['nome']}%")
                ->where('registro', 'like',"%{$search['registro']}%")
                ->where('created_at', 'like',"%{$search['data']}%");
            }
        })->paginate($this->totalPage);

        return view('clientes.index', compact('clientes'));
    }
}
