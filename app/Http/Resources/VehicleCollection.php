<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\UserResource;

class VehicleCollection extends ResourceCollection
{
    public function toArray($request)
    {   
        return [
            'data' => $this->collection,
        ];
        // return [
        //     'data' => $this->collection->map(function ($vehicle) {
        //         return [
        //             'vehicle' => $vehicle,
        //             'user' => new UserResource($vehicle->user),
        //         ];
        //     }),
        // ];
    }
}
