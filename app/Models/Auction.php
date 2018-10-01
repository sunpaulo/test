<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Physical\Auction as Physical;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property $customer_id integer
 * @property $product_id integer
 * @property $origin_price float
 * @property $status string
 */
class Auction extends Model
{
    use ModelTrait, Physical, SoftDeletes;

    const COUNT_ON_PAGE = 20;

    protected $table = 'auction';

    protected $fillable = ['customer_id', 'product_id', 'origin_price', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
