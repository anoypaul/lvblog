<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $table = "registrations";
    protected $primaryKey = "registrations_id";
    protected $fillable = ["registrations_id", "registrations_name", "registrations_phone", "registrations_email", "registrations_image", "registrations_description", "registrations_password"];
}
