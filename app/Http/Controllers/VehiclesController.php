<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateVehicleRequest;

class VehiclesController extends Controller
{
    public function switch_status(Request $request){
        $id = $request->input('vehicle_id');
        $is_active = DB::table('vehicles')
            ->select('is_active')
            ->where('vehicle_id', '=', $id);
        DB::update("UPDATE `vehicles` SET `is_active` = NOT `is_active` WHERE `vehicle_id` = $id");
        return back()->withInput();
    }

    public function delete($id){
        DB::table('vehicles')
            ->where('vehicle_id', '=', $id)
            ->delete();
        return back()->withInput();
    }
}
