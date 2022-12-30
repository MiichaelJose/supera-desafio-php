<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Vehicle;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id'];

    public $timestamps = false;

    public function vehicle() 
    {
        return $this->belongsTo(Vehicle::class);
    }
}
