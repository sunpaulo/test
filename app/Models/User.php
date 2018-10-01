<?php

namespace App\Models;

use App\Enums\Role;
use App\Traits\ModelTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Physical\User as Physical;

/**
 * Class User
 * @package App\Models
 * @property $name string
 * @property $email string
 * @property $password string
 * @property $role string
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable,
        Authorizable,
        CanResetPassword,
        Physical,
        ModelTrait,
        SoftDeletes;

    protected $table = 'user';

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token', 'role'
    ];

    public function newQuery()
    {
        // get all users in User model
        $roles = method_exists($this, 'getUserRole') ? $this->getUserRole() : Role::values();

        return parent::newQuery()->whereIn('role', (array)$roles);
    }
}
