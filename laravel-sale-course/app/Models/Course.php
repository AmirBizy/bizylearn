<?php

namespace App\Models;

use App\Models\User;
use App\Models\SideCourse;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory , Sluggable;

    protected $table = "courses";
    protected $guarded = [];
    protected $appends = ['video_url'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'category']
            ]
        ];
    }

    public function getVideoUrlAttribute()
    {
        return $this->hasMany(CourseVideo::class , 'course_id' , 'video_url');
    }

    public function purchasedCourses()
    {
        return $this->belongsToMany(Transaction::class, 'user_id')->withTimestamps();
    }

    public function creatorCourse()
    {
        return $this->belongsTo(User::class , 'author' , 'id');
    }

    public function categoryName()
    {
        return $this->belongsTo(Category::class , 'category');
    }

}
