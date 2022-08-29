<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArmoredZoomTime extends Model
{
    protected $fillable = [
        'mentor_name',
        'appointed_time',
        'student_name',
        'zoom_url',
    ];
    use HasFactory;
}
