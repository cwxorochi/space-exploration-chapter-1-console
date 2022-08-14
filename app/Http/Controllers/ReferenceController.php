<?php

namespace App\Http\Controllers;

use App\Http\Traits\AlgorithmTrait;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    use AlgorithmTrait;
    
    public function getPi() 
    {
        return $this->algoPi(config('constants.PI_PRECISION'));
    }

    
}
