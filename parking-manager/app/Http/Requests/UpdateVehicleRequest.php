<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        foreach ($this->request->get('vehicles') as $key => $value){
            $rules['brand'] = 'required';
            $rules['model'] = 'required';
            $rules['color'] = 'required';
            $rules['licence_plate'] = [
                'unique:App\Models\VehicleModel,licence_plate',
                'regex:/^[а-я]{2}\d{3}[а-я]{1}\d{2,3}$/',
            ];
        }
        return $rules;
    }
}
