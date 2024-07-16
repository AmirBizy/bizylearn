<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideCourse extends Model
{
    use HasFactory;

    protected $table = "side_course";
    protected $guarded = [];

    public function sideCourse()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
