<?php

namespace Boye;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Boye\Support\FilterPaginateOrder;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use FilterPaginateOrder;
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'username', 'status', 'avatar', 'confirm_code', 'roles', 'is_admin', 'password',
    ];
    /* Whitelist of filter-able columns*/
    protected $filter = ['id', 'company', 'email', 'name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
