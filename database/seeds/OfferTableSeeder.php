<?php

use App\Models\Offer;

class OfferTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(Offer::class, self::OFFERS_COUNT)->create();
    }
}
