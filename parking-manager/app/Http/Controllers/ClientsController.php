<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\{CreateClientRequest, UpdateClientRequest};

class ClientsController extends Controller
{
    public function create(CreateClientRequest $request){
        $full_name = $request->input('full_name');
        $gender = $request->input('gender');
        $phone_num = $request->input('phone_num');
        $address = $request->input('address');
        DB::table('client')
            ->insert([
                'full_name' => $full_name,
                'gender' => $gender,
                'phone_num' => $phone_num,
                'address' => $address,
            ]);
        $client_id = DB::table('clients')
            ->select('client_id')
            ->where('phone_num', '=', $phone_num);

        $vehicles = $request->input('vehicles');
        foreach ($vehicles as $key => $value){
            $color = $request->input('color')[$key];
            $brand = $request->input('brand')[$key];
            $licence_plate = $request->input('licence_plate')[$key];
            $is_active = $request->input('is_active')[$key];
            DB::table('vehicles')
                ->insert([
                    'color' => $color,
                    'brand' => $brand,
                    'licence_plate' => $licence_plate,
                    'is_active' => $is_active,
                    'client_id' => $client_id
                ]);
        }
        return redirect('/client/'.str($client_id));
    }

    public function update(UpdateClientRequest $request){
        $id = $request->input('client_id');
        $full_name = $request->input('full_name');
        $gender = $request->input('gender');
        $phone_num = $request->input('phone_num');
        $address = $request->input('address');
        DB::table('client')
            ->where('client_id','=', $id)
            ->update([
                'full_name' => $full_name,
                'gender' => $gender,
                'phone_num' => $phone_num,
                'address' => $address,
            ]);

        return redirect("/client/$id");
    }


    public function delete($id){
        DB::table('clients')
            ->where('client_id', '=', $id)
            ->delete();
        return redirect('/');
    }
}
