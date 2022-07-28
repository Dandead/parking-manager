<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClientRequest;

class ClientsController extends Controller
{
    public function create(ClientRequest $request){
        $full_name = $request->input('full_name');
        $gender = $request->input('gender');
        $phone_num = $request->input('phone_num');
        $address = $request->input('address');
        DB::table('clients')
            ->insert([
                'full_name' => $full_name,
                'gender' => $gender,
                'phone_num' => $phone_num,
                'address' => $address,
            ]);
        $client_id = DB::table('clients')
            ->select('client_id')
            ->where('phone_num', '=', $phone_num)
            ->get()[0]->client_id;

        for ($i=0; $i < (int)$request->input('forms_count'); $i++){
            $brand = $request->input('brand')[$i];
            $model = $request->input('model')[$i];
            $color = $request->input('color')[$i];
            $licence_plate = $request->input('licence_plate')[$i];
            $is_active = $request->input('is_active')[$i];
            DB::table('vehicles')
                ->insert([
                    'brand' => $brand,
                    'model' => $model,
                    'color' => $color,
                    'licence_plate' => $licence_plate,
                    'is_active' => $is_active,
                    'client_id' => $client_id
                ]);
        }
        return redirect('/client/'.str($client_id));
    }

    public function update(Request $request){
        $id = $request->input('client_id');
        $full_name = $request->input('full_name');
        $gender = $request->input('gender');
        $phone_num = $request->input('phone_num');
        $address = $request->input('address');
        DB::table('clients')
            ->where('client_id','=', $id)
            ->update([
                'full_name' => $full_name,
                'gender' => $gender,
                'phone_num' => $phone_num,
                'address' => $address,
            ]);

        for ($i=0; $i < (int)$request->input('forms_count'); $i++){
            $vehicle_id = $request->input('vehicle_id')[$i];
            $brand = $request->input('brand')[$i];
            $model = $request->input('model')[$i];
            $color = $request->input('color')[$i];
            $licence_plate = $request->input('licence_plate')[$i];
            $is_active = $request->input('is_active')[$i];
            DB::table('vehicles')
                ->where('vehicle_id','=',$vehicle_id)
                ->update([
                    'brand' => $brand,
                    'model' => $model,
                    'color' => $color,
                    'licence_plate' => $licence_plate,
                    'is_active' => $is_active,
                ]);
        }


        return redirect("/client/$id");
    }


    public function delete($id){
        DB::table('clients')
            ->where('client_id', '=', $id)
            ->delete();
        return redirect('/');
    }
}
