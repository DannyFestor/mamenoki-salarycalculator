<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class School extends Model
{
    protected $fillable = [
        'uuid',
        'name',
    ];

    protected static function booted()
    {
        parent::booted();

        static::creating(function (self $model) {
            $model->uuid = Str::uuid();
        });
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'school_id');
    }
}

