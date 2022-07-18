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
                ->leftJoin('vehicles', 'clients.client_id', '=', 'vehicles.vehicle_id')
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
            ->where('client_id','=', $id);

        $vehicles = DB::table('vehicles')
            ->select([
                'vehicle_id',
                'brand',
                'model',
                'color',
                'licence_plate',
                'is_active',
            ])
            ->where('client_id', '=', $id);
        return view('client_page', ['client' => $client, 'vehicles' => $vehicles]);
    }

    public function AddClientPage(){
        return view('add_client_page');
    }

    public function EditClientPage(){
        return view();
    }

    public function EditVehiclesPage(){
        return view();
    }
}
