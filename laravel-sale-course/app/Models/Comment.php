<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $guarded = [];

    public function getCourseNameAttribute()
    {
        return $this->hasMany(Course::class , 'id' , 'course_id');
    }

    public function userComment()
    {
        return $this->belongsTo(User::class , 'username');
    }

    public function userCourseComment()
    {
        return $this->belongsTo(Course::class , 'course_id');
    }

    public function adminReply()
    {
        return $this->belongsTo(User::class , 'admin_name');
    }
}
