<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    protected $hidden = [
        'password'
    ];
}
