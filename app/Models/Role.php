<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasAdvancedFilter, HasFactory;

    protected $orderable = [
        'id',
        'title',
    ];

    protected $filterable = [
        'id',
        'title',
        'permissions.title',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}