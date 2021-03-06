<?php namespace Modules\Eventos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosRequest extends FormRequest {

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
			'titulo' => 'required',
			'contenido' => 'required',
			'fecha' => 'required',
		];
	}

}
