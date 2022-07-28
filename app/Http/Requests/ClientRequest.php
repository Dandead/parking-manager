<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ClientRequest extends FormRequest
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
                'regex:/^([a-zA-Zа-яА-Я]+\s){2}[a-zA-Zа-яА-Я]+$/u',
            ],
            'gender' => 'required',
            'phone_num' => [
                'required',
                'unique:App\Models\ClientModel,phone_num',
                'regex:/^(?:\+7|8)?9(?:\d{9})$/u',
            ],
            'address' => 'max:255',
            'brand.*' => 'required',
            'model.*' => 'required',
            'color.*' => 'required',
            'licence_plate.*' => [
                'required',
                'unique:App\Models\VehicleModel,licence_plate',
                'regex:/^[а-я]{2}\d{3}[а-я]{1}\d{2,3}$/u',
            ],
        ];
//        for ($i=0; $i < (int)$this->request->get('forms_count'); $i++){
//        foreach ($this->request->get('brand') as $i => $value){
//        $rules['brand'] = 'required';
//        $rules['model'][$i] = 'required';
//        $rules['color'][$i] = 'required';
//        $rules['licence_plate'][$i] = [
//                'required',
//                'unique:App\Models\VehicleModel,licence_plate',
//                'regex:/^[а-я]{2}\d{3}[а-я]{1}\d{2,3}$/',
//            ];
//        }
        return $rules;


    }
    public function messages(){

        $messages = [
            'full_name.required' => 'Required field!',
            'full_name.regex' => 'Not correct full name!',
            'phone_num.required' => 'Required field!',
            'phone_num.unique' => 'This phone number has already been used!',
            'brand.required' => 'Required field!',
            'model.required' => 'Required field!',
            'gender.required' => 'Required field!',
            'licence_plate.required' => 'Required field!',
            'licence_plate.regex' => 'Not correct plate number!',
            'licence_plate.unique' => 'This number not unique!',
        ];
//            for ($i=0; $i < (int)$this->request->get('forms_count'); $i++){
//                $messages[$i] =[
//                    'licence_plate.required' => 'Required field!',
//                    'licence_plate.regex' => 'Not correct plate number!',
//                    'licence_plate.unique' => 'This number not unique!',
//                ];
//            }

        return $messages;
    }
}
