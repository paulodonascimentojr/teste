<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
           
            $rules = ['nome' => 'required', 'registro' => 'required'];
            $registro = $this->get('registro');
            $empresa = Empresa::where('nome','=',$this->get('empresa'));
            //$this->get('empresa');
            $criado = strtotime($this->get('created_at'));
            $nascimento = strtotime($this->get('nascimento'));

            if (strlen($registro) < 14)
            {
                $rules['rg'] = 'required';
                $rules['nascimento'] = 'required';
            }
            if (($nascimento - $criado) < 18 && $empresa == 'PR' && strlen($registro) < 14)
            {
                $rules['nascimento'] = 'error';
            }

            return $rules;
            
            Cliente::create($request->all());
    
            return redirect()->route('clientes.index')
                            ->with('success','Cliente cadastrado com sucesso.');
        
    }
    public function messages(){
        return[
            'rg.required'=>'Para pessoa física, é obrigatório preenchimento do RG.',
            'nascimento.required'=>'Para pessoa física, é obrigatório preenchimento da data de nascimento.',
            'nascimento.required'=>'Clientes menores de 18 anos não podem ser cadastrados em conjunto com empresas do Paraná.',
        ];
    }
}
