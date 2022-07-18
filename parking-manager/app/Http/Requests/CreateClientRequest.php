<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'full_name' => [
                'required',
                'min:3',
                'regex:/^([a-zа-я]+\s){2}[a-zа-я]+$/i',
            ],
            'gender' => 'required',
            'phone_num' => [
                'required',
                'unique:App\Models\ClientModel,phone_num',
                'regex:/^(?:\+7|8)?9(?:\d{9})$/',
            ],
            'address' => 'max:255',
        ];
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
