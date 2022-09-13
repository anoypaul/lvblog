<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeting extends Model
{
    use HasFactory;
    protected $table = 'seeting';
    protected $primaryKey = 'seeting_id';
    protected $fillable = ['seeting_id', 'seeting_name', 'seeting_site_logo', 'seeting_about_site', 'seeting_facebook', 'seeting_twitter', 'seeting_instagram', 'seeting_reddit', 'seeting_email', 'seeting_copyright'];
}
