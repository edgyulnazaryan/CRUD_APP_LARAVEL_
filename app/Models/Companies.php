<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;


class Companies extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'logo', 'website',
    ];

    protected static function booted()
    {
        parent::boot();

        static::addGlobalScope('desc', function (Builder $builder) {
            $builder->orderBy('companies.id', 'desc');
        });

    }
}
