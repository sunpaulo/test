<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Physical\Order as Physical;

/**
 * Class Order
 * @package App\Models
 * @property $seller_id int
 * @property $product_id int
 * @property $customer_id int
 * @property $price float
 */
class Order extends Model
{
    use ModelTrait, Physical;

    const COUNT_ON_PAGE = 20;

    protected $table = 'orders';

    protected $fillable = ['seller_id', 'product_id', 'customer_id', 'price'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
