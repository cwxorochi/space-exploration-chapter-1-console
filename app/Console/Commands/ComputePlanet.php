<?php

namespace App\Console\Commands;

use App\Http\Traits\AlgorithmTrait;
use App\Models\Planet;
use Illuminate\Console\Command;

class ComputePlanet extends Command
{
    use AlgorithmTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compute:planet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate every planet';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // check for Pi reference first
        $piRef = $this->algoGetPiReference();

        foreach(Planet::all() as $planet) {
            $planet->circumference = $this->algoCircumference($planet->radius, $piRef->value);
            $planet->save();
        }

        $this->info('Finished');
    }
}
