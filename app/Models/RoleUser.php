<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
