<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UpdateMineralRequest extends FormRequest
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
        
            "name_of_minerals2"=>"required|unique:minerals,name_of_minerals",
        
        ];
        
    }
    protected function prepareForValidation(){
        
        $this->merge([
            'name_of_minerals2'=>strip_tags($this['name_of_minerals2'])

        ]);
    }
    public function messages()
    {
        return ['name_of_minerals2.unique' => 'You must be using your old mineral name or using an existing mineral name.'];
    }
 

}