<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Physical\Order as Physical;

/**
 * Class Order
 * @package App\Models
 * @property $offer_id int
 * @property $customer_id int
 */
class Order extends Model
{
    use ModelTrait, Physical;

    const COUNT_ON_PAGE = 20;

    protected $table = 'orders';

    protected $fillable = ['offer_id', 'customer_id'];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
