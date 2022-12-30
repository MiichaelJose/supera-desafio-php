<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\VehicleResource;
use Illuminate\Support\Collection;

use App\Models\Vehicle;

use App\Http\Resources\VehicleCollection;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return new VehicleCollection($vehicles);
    }

    public function store(Request $request)
    {
        Vehicle::create([
            "id"=> $request->id,
            "user_id"=> $request->user_id,
            "vehicle"=> $request->des,
            "brand"=> $request->brand,
            "model"=> $request->model,
            "version"=> $request->version
        ]);

        return redirect('/home');
    }

    public function show($id)
    {
        $vehicle = Vehicle::with('user')->first();
        $user = $vehicle->user;
        return $vehicle;
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
