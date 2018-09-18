<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use App\Models\Physical\Role as Physical;
use App\Traits\ModelTrait;

/**
 * Class Role
 * @package App\Models
 * @property $name string
 * @property $display_name string
 * @property  $description string
 */
class Role extends EntrustRole
{
    use Physical, ModelTrait;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'role';
    }

    protected $fillable = ['name', 'display_name', 'description'];
}