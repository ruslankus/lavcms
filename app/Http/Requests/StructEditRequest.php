<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StructEditRequest extends Request
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
        $rules = [


            'label' => 'required',
            'id_name' => 'required',

        ];

        foreach($this->request->get('trl') as $key => $val)
        {
            $rules['trl.'.$key] = 'required';
        }

        return $rules;
    }
}
