<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Physical\User as Physical;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * Class User
 * @package App\Models
 * @property $name string
 * @property $email string
 * @property $password string
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable,
        Authorizable,
        CanResetPassword,
        Physical,
        ModelTrait,
        EntrustUserTrait
    {
        EntrustUserTrait ::can insteadof Authorizable; //add insteadof avoid php trait conflict resolution
    }

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
