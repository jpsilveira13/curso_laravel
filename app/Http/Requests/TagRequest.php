<?php namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class TagRequest extends Request {

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
            'name' => 'required|unique:tags,name'
		];
	}

    public function messages(){
        return[
            'name.required' => "Nome não pode  ser vazio",
            'name.unique' => "Nome não pode  ser repetido"
        ];
    }

}
