<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PsbRegistration extends Model
{
    protected $fillable = [
        'parent_name',
        'child_name',
        'phone',
        'email',
        'notes',
        'status',
    ];
}

