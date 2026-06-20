<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    use HasFactory;
    protected $table = 'roles';

    public const ADMIN_ROLE_ID = 1;
    public const TELECALLER_ROLE_ID = 2;
    public const ASSOCIATE_ROLE_ID = 3;
    public const CORDINATOR_ROLE_ID = 4;
}