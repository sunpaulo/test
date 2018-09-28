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
 * @property $slug string
 */
class Product extends Model
{
    use ModelTrait, SoftDeletes, Physical;

    const COUNT_ON_PAGE = 20;

    protected $table = 'product';

    protected $fillable = ['name', 'slug', 'creator_id', 'moderator_id'];

    protected $hidden = ['creator_id', 'moderator_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_to_category');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function scopeLastProducts($query, $count)
    {
        return $query->orderByDesc('id')->take($count)->get();
    }
}
