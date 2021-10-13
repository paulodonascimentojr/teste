<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use App\Models\Empresa;
use App\Http\Requests\Cliente;
use DateTime;
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
            $empresas = Empresa::where('nome','=',$this->get('empresa') )->get();
            $nascimento = ($this->get('nascimento'));
            $atual = new DateTime();
            $diferenca = ($atual->diff(new DateTime($nascimento)))->y;

            if (strlen($registro) < 14)
            {
                $rules['rg'] = 'required';
                $rules['nascimento'] = 'required';
            }
            foreach ($empresas as $empresa):
                if($empresa->uf == 'PR'){
                    if ($diferenca < 18 && strlen($registro) < 14)
                    {
                        $rules['nascimento'] = 'prohibited';
                    }
                }
            endforeach;

            return $rules;

           
            return redirect()->route('clientes.index')
                            ->with('success','Cliente cadastrado com sucesso.');

    }
    public function messages(){
        return[
            'rg.required'=>'Para pessoa física, é obrigatório preenchimento do RG.',
            'nascimento.required'=>'Para pessoa física, é obrigatório preenchimento da data de nascimento.',
            'nascimento.prohibited'=>'Clientes menores de 18 anos não podem ser cadastrados em conjunto com empresas do Paraná.',
        ];
    }
}
