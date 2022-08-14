<?php

namespace App\Http\Resources;

use App\Http\Traits\AlgorithmTrait;
use App\Models\Reference;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanetResource extends JsonResource
{
    use AlgorithmTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'radius' => $this->radius,
            'circumference' => $this->circumference,
            'pi' => Reference::where('key', 'pi')->exists() ? Reference::where('key', 'pi')->first()->value : $this->algoPi(config('constants.PI_PRECISION')),
        ];
    }
}
