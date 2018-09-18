<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Physical\Product as Physical;

/**
 * Class Product
 * @package App\Models
 * @property $name string
 * @property $price float
 * @property $manager_id integer
 */
class Product extends Model
{
    use ModelTrait, SoftDeletes, Physical;

    protected $table = 'product';

    protected $fillable = ['name', 'price', 'manager_id'];
}
