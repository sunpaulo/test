<?php

namespace App\Services\Logical;

use App\Http\Requests\UpdateRateRequest;
use App\Models\Rate;

class RateManagement
{
    public static function updateFromRequest(UpdateRateRequest $request, Rate $rate)
    {
        $rate->update($request->only('value'));

        return;
    }
}