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
 * @property $creator_id integer
 * @property $moderator_id integer
 */
class Product extends Model
{
    use ModelTrait, SoftDeletes, Physical;

    protected $table = 'product';

    protected $fillable = ['name', 'creator_id', 'moderator_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_to_category');
    }

    public function scopeLastProducts($query, $count)
    {
        return $query->orderByDesc($this->getCreatedAtColumn())->take($count)->get();
    }
}