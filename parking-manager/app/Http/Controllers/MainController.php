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
//        $clients = DB::select(
//            "SELECT clients.client_id, clients.full_name, vehicles.vehicle_id , vehicles.licence_plate
//            FROM clients JOIN vehicles ON clients.client_id = vehicles.client_id ORDER BY clients.client_id ASC"
//        )->paginate(7);
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

    public function EditClientPage(){
        return view('edit_client_page');
    }

    public function EditVehiclesPage(){
        return view('edit_vehicle_page');
    }
}
