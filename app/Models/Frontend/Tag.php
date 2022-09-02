<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tages"; 
    protected $primaryKey = "tages_id"; 
    protected $fillable = ["tages_id", "tages_name ", "tages_slug", "tages_description"]; 
}
