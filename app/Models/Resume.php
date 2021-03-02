<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'desired_job', 'education', 'comments', 'filename', 'ip_address', 'send_at' ];
    use HasFactory;
}