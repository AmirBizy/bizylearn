<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(User::class, 'id')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function courses()
    {
        return $this->belongsTo(Course::class , 'course_id' , 'id');
    }
}
