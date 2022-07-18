<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateVehicleRequest;

class VehiclesController extends Controller
{
    public function update(UpdateVehicleRequest $request){
        $vehicles = $request->input('vehicles');
        foreach ($vehicles as $key => $value){
            $id = $request->input('vehicle_id')[$key];
            $color = $request->input('color')[$key];
            $brand = $request->input('brand')[$key];
            $licence_plate = $request->input('licence_plate')[$key];
            $is_active = $request->input('is_active')[$key];
            DB::table('vehicles')
                ->where('vehicle_id','=', $id)
                ->update([
                    'color' => $color,
                    'brand' => $brand,
                    'licence_plate' => $licence_plate,
                    'is_active' => $is_active,
                ]);
        }
    }

    public function switch_status($id){
        $is_active = DB::table('vehicles')
            ->select('is_active')
            ->where('vehicles_id', '=', $id);
        DB::table('vehicles')
            ->where('vehicles_id', '=', $id)
            ->update([
                'is_active' => !$is_active
            ]);
    }

    public function delete($id){
        DB::table('vehicles')
            ->delete("$id");
        return redirect('/');
    }
}
