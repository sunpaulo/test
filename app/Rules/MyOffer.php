<?php

namespace App\Rules;

use App\Models\Offer;
use Illuminate\Contracts\Validation\Rule;
use Auth;

class MyOffer implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $offer = Offer::find($value);

        return $offer->getSellerId() === Auth::id();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.messages.my-product-offer');
    }
}
