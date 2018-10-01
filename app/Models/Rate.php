<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Physical\Rate as Physical;

/**
 * @property $auction_id integer
 * @property $seller_id integer
 * @property $value float
 */
class Rate extends Model
{
    use ModelTrait, SoftDeletes, Physical;

    protected $table = 'rate';

    protected $fillable = ['auction_id', 'seller_id', 'value'];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
