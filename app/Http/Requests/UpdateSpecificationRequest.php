<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecificationRequest extends FormRequest
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
        return ["specification_name2"=>"required|unique:specification,specification_name",
      "mineral_id"=>"required"];
    }
    public function messages()
    {
        return [
            'specification_name2.unique' => 'Specification record must be unique.',
            'specification_name2.required' => 'A Specification record is required.',
            'mineral_id.required' => 'A mineral record is required.',
        ];
    }
    protected function prepareForValidation(){
        // $this['name_of_minerals']=!empty($this['name_of_minerals2']) ? $this['name_of_minerals2'] : $this['name_of_minerals'];
        
        $mineral_string=$this->mineral_select2;
        
       
        $this->merge([
            'specification_name2'=>strip_tags($this['specification_name2']),'mineral_id'=>strip_tags($mineral_string)
        ]);
    }
}
