<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey ="categories_id";
    protected $fillable =["categories_id ", "categories_name ", "categories_slug", "categories_description"];
}
