<?php

namespace App\Rules;

use App\Enums\AuctionStatus;
use App\Models\Auction;
use Illuminate\Contracts\Validation\Rule;

class AvailableAuction implements Rule
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
        $auction = Auction::find($value);

        return $auction->getStatus() === AuctionStatus::IN_PROGRESS;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This auction is already closed';
    }
}
