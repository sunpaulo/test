<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Physical\Category as Physical;

/**
 * Class Category
 * @package App\Models
 * @property $name string
 * @property $parent_id integer
 */
class Category extends Model
{
    use Physical, ModelTrait;

    protected $table = 'category';

    protected $fillable = ['name', 'parent_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_to_category');
    }

    /**
     * return children of category
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function scopeLastCategories($query, $count)
    {
        return $query->orderByDesc($this->getCreatedAtColumn())->take($count)->get();
    }
}