<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $clients = DB::table('clients')
                ->select([
                    'clients.client_id as client_id',
                    'clients.full_name as full_name',
                    'vehicles.vehicle_id as vehicle_id',
                    'vehicles.licence_plate as licence_plate',
                ])
                ->Join('vehicles', 'clients.client_id', '=', 'vehicles.client_id')
                ->paginate(7);
            return view('index', ['clients' => $clients]);
    }

    public function ClientPage($id){
        $client = DB::table('clients')
            ->select([
                'client_id',
                'full_name',
                'gender',
                'phone_num',
                'address',
            ])
            ->where('client_id','=', $id)
            ->get();

        $vehicles = DB::table('vehicles')
            ->select([
                'vehicle_id',
                'brand',
                'model',
                'color',
                'licence_plate',
                'is_active',
            ])
            ->where('client_id', '=', $id)
            ->get();
        return view('client_page', ['client' => $client, 'vehicles' => $vehicles]);
    }

    public function AddClientPage(){
        return view('add_client_page');
    }

    public function DisplayParking(){
        $clients = DB::table('clients')
            ->select(['client_id', 'full_name'])
            ->get();
        $vehicles = DB::table('clients')
            ->select([
                'clients.client_id as client_id',
                'clients.full_name as full_name',
                'vehicles.vehicle_id as vehicle_id',
                'vehicles.licence_plate as licence_plate',
                'vehicles.is_active as is_active',
            ])
            ->join('vehicles', 'clients.client_id', '=', 'vehicles.client_id')
            ->where('is_active', '=', '1')
            ->paginate(7);
        return view('parking', ['clients' => $clients, 'vehicles' => $vehicles]);
    }

    public function GetClientCars(Request $request){
            $html = '';
            $client_id = $request->input('value');
            $vehicles = DB::table('vehicles')
                ->where('client_id', '=', $client_id)
                ->where('is_active','=','0')
                ->select()
                ->get();
            foreach ($vehicles as $veh) {
                $html .= '<option value="'.$veh->vehicle_id.'">id: '.$veh->vehicle_id.' Licence plate: '.$veh->licence_plate.'</option>';
            }

        return response()->json(['html' => $html]);
    }
}
