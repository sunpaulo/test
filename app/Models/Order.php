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

    protected $table = 'order';

    protected $fillable = ['offer_id', 'customer_id'];

    public function offer()
    {
        
    }
}
