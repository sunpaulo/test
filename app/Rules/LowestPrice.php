<?php

namespace App\Rules;

use App\Models\Auction;
use Illuminate\Contracts\Validation\Rule;

class LowestPrice implements Rule
{
    private $auctionId;

    public function __construct(int $auction_id)
    {
        $this->auctionId = $auction_id;
    }

    public function passes($attribute, $value)
    {
        $auction = Auction::find($this->auctionId);

        return $auction->rates()->where('value', '<', $value)->doesntExist();
    }

    public function message()
    {
        return 'You must set a lower price';
    }
}
