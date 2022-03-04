<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMineralRequest extends FormRequest
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
            "name_of_minerals"=>"required|unique:minerals"
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'name_of_minerals'=>strip_tags($this['name_of_minerals'])

        ]);
    }
}
