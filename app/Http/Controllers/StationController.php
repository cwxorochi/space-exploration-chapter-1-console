<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanetResource;
use App\Http\Traits\AlgorithmTrait;
use App\Models\Planet;
use App\Models\Reference;
use Illuminate\Http\Request;

class StationController extends Controller
{
    use AlgorithmTrait;

    public function getSunAttributes()
    {
        $planet = Planet::where('name', 'sun')->first();

        if (!$planet) {

            // create the planet if not found
            $planet = Planet::create([
                'name' => 'sun',
                'radius' => config('constants.SUN_RADIUS'),
                'circumference' => 0
            ]);
            // calculate the circumference
            $piRef = $this->algoGetPiReference();

            $planet->circumference = $this->algoCircumference($planet->radius, $piRef->value);
            $planet->save();
        }

        return new PlanetResource($planet);
    }

    
}
