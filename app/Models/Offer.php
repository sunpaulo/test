<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Physical\Offer as Physical;

/**
 * Class Offer
 * @package App\Models
 * @property $product_id integer
 * @property $seller_id integer
 * @property $price float
 */
class Offer extends Model
{
    use ModelTrait, Physical;

    protected $table = 'offer';

    protected $fillable = ['product_id', 'seller_id', 'price'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
