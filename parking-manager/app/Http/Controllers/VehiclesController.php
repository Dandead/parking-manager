<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateVehicleRequest;

class VehiclesController extends Controller
{
    public function update(UpdateVehicleRequest $request, $id){
//        $id = $request->input('vehicle_id');
        $color = $request->input('color');
        $brand = $request->input('brand');
        $licence_plate = $request->input('licence_plate');
        $is_active = $request->input('is_active');
        DB::table('vehicles')
            ->where('vehicle_id','=', $id)
            ->update([
                'color' => $color,
                'brand' => $brand,
                'licence_plate' => $licence_plate,
                'is_active' => $is_active,
            ]);
    }

    public function switch_status($id){
        $is_active = DB::table('vehicles')
            ->select('is_active')
            ->where('vehicle_id', '=', $id);
        DB::update("UPDATE `vehicles` SET `is_active` = NOT `is_active` WHERE `vehicle_id` = $id");
//        DB::table('vehicles')
//            ->where('vehicle_id', '=', $id)
//            ->update([
//                'is_active' => !$is_active
//            ]);
        return back()->withInput();
    }

    public function delete($id){
        DB::table('vehicles')
            ->where('vehicle_id', '=', $id)
            ->delete();
        return back()->withInput();
    }
}
