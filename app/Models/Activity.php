<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'student_id', 'activity_name', 'activity_date', 'description'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
