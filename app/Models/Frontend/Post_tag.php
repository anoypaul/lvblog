<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//*** This is the AdminSide Model **

class Post_tag extends Model
{
    use HasFactory;

    protected $table = 'post_tag';
    protected $primaryKey = 'post_tag_id';
    protected $fillable = ['post_tag_id', 'posts_id', 'tages_id'];

    // protected $casts = [
    //     'tages_id' => 'array',
    // ];
}
