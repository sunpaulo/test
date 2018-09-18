<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Zizaco\Entrust\EntrustPermission;
use App\Models\Physical\Permission as Physical;

/**
 * Class Permission
 * @package App\Models
 * @property $name string
 * @property $display_name string
 * @property $description string
 */
class Permission extends EntrustPermission
{
    use Physical, ModelTrait;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'permission';
    }

    protected $fillable = ['name', 'display_name', 'description'];
}