<?php namespace Modules\Empresa\Http\Requests;

use App\Http\Requests\Request;

class EmpresaRequest extends Request
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
      return [
          'nombre' => 'required',
          'rubro' => 'required',
          'direccion' => 'required',
          'telefono' => 'required',
          'subcategoria_id' => 'required',
          'ciudad_id' => 'required',
          'pais_id' => 'required',
      ];
    }
}