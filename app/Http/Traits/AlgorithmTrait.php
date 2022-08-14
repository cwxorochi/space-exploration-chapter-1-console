<?php

namespace App\Http\Traits;

use App\Models\Reference;

trait AlgorithmTrait
{
    public function bcfact($n)
    {
        return ($n == 0 || $n == 1) ? 1 : bcmul($n, $this->bcfact($n - 1));
    }

    // Chudnovsky algorithm
    // https://en.wikipedia.org/wiki/Chudnovsky_algorithm
    public function algoPi($precision)
    {
        $num = 0;
        $k = 0;
        bcscale($precision + 3);
        $limit = ($precision + 3) / 14;
        while ($k < $limit) {
            $Mk = bcdiv($this->bcfact(6*$k),  bcmul( $this->bcfact(3 * $k), bcpow($this->bcfact($k), 3) ));
            $Lk = bcadd('13591409', bcmul('545140134', $k));
            $Xk = bcmul( bcpow('640320', 3 * $k + 1), bcsqrt('640320') );

            $num = bcadd(
                $num, 
                bcdiv(
                    bcmul(
                        $Mk,
                        bcmul( $Lk, bcpow( -1, $k ), ), 
                    ),
                    $Xk
                )
            );
            ++$k;
        }
        return bcdiv(1, (bcmul(12, ($num))), $precision);
    }

    public function algoCircumference($radius, $pi)
    {
        return bcmul(2, bcmul($radius, $pi, config('constants.SUN_PRECISION')), config('constants.SUN_PRECISION'));
    }

    public function algoGetPiReference()
    {
        $piRef = Reference::where('key', 'pi')->first();

        if (!$piRef) {
            // pi reference is not in place, create one
            $piValue = $this->algoPi(config('constants.PI_PRECISION'));
            $piRef = Reference::create([
                'key' => 'pi',
                'value' => $piValue
            ]);
        }

        return $piRef;
    }
}
