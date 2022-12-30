<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\MaintenanceCollection;
use App\Http\Resources\MaintenanceResource;

use App\Models\Maintenance;
use App\Models\Vehicle;

use Log;

class MaintenanceController extends Controller
{
    public function view() 
    {
        return view('maintenance');
    }

    public function index()
    {
        $maintenance = Maintenance::all();
        return new MaintenanceCollection($maintenance);
    }

    public function store(Request $request)
    {
        
        $maintenance = new Maintenance;
        $maintenance->vehicle_id = $request->vehicle_id;
        $maintenance->description = $request->description;
        $maintenance->registration_date = now();
        $maintenance->save();

        return redirect()->route('maintenance.view')->with('status', 'Cadastrado com sucesso!');
    }

    public function show($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        return new MaintenanceResource($maintenance);
    }

    public function update(Request $request, $id)
    {
        $maintenance = Maintenance::find($id);
        $maintenance->analysis_date = $request->analysis_date;
        $maintenance->start_date = $request->start_date;
        $maintenance->final_date = $request->final_date;
        $maintenance->save();
       

        return redirect('maintenance-view')->with('status', 'Alterado com sucesso!');
    }

    public function destroy($id)
    {
        Maintenance::findOrFail($id)->delete();

        return redirect('maintenance-view')->with('status', 'Deletado com sucesso!');
    }
}
