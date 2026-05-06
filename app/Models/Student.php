<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'grade', 'gender', 'birth_date', 'address', 'parent_name', 'phone'
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
