<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//*** This is the AdminSide Model **

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $primaryKey = "posts_id";
    protected $fillable = ["posts_id", "tages_id", "posts_title", "post_slug", "posts_image", "posts_description", "categories_id", "user_name", "post_published_at"];

    protected $casts = [
        'post_published_at' => 'datetime:Y-m-d',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function tags(){
        // return $this->belongsToMany('App\Models\Frontend\Tag');
        return $this->belongsToMany(Tag::class, 'tages_id');
    }
}
