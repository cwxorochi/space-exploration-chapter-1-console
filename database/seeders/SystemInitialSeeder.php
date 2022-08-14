<?php

namespace Database\Seeders;

use App\Http\Traits\AlgorithmTrait;
use App\Models\Reference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemInitialSeeder extends Seeder
{
    use AlgorithmTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reference::firstOrCreate(
            [ 
                'key' => 'pi'
            ],
            [ 
                'value' => $this->algoPi(config('constants.PI_PRECISION'))
            ]
        );
    }
}
