<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleComment extends Model
{
    use HasFactory;

    protected $table = "article_comments";
    protected $guarded = [];


    public function userArticleComment()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function ArticleCommentBlade()
    {
        return $this->belongsTo(Article::class , 'article_id');
    }

    public function adminReply()
    {
        return $this->belongsTo(User::class , 'admin_name');
    }

}
