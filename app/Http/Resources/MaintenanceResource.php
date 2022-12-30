<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\VehicleResource;

class MaintenanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "vehicle_id"=> new VehicleResource($this->vehicle),
            "description"=> $this->description,
            "registration_date"=> $this->registration_date,
            "analysis_date"=> $this->analysis_date,
            "start_date"=> $this->start_date,
            "final_date"=> $this->final_date
        ];
    }
}
