<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'attendance_date',
        'attendance_session',
        'status',
        'remarks'       
    ];
}
