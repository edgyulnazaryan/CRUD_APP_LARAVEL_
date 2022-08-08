<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;


class Employees extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'company_id',
    ];

    protected static function booted()
    {
        static::addGlobalScope('desc', function (Builder $builder) {
            $builder->orderBy('employees.id', 'desc');
        });

    }

    public function company()
    {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }
}
