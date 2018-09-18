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
}