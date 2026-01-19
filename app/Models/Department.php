<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'inep_code',
        'name',
        'acronym',
        'cnpj',
        'email',
        'phone',
        'street',
        'city',
        'number',
        'district',
        'state',
        'neighborhood',
        'zip_code',
        'secretary_id',
        'is_active',
    ];
}
