<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $primaryKey = 'contacts_id';
    protected $fillable = ['contacts_id', 'contacts_name', 'contacts_email', 'contacts_subject', 'contacts_message'];
    
}
