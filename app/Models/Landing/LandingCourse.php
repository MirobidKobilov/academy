<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Langding page courses section tables
 * App\Models\Landing\LandingCourse
 * @property string $course_title
 * @property string $course_desc
 * @property string $course_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @var string[]
 *
 * @uses HasFactory
 */

class LandingCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_title',
        'course_desc',
        'course_image',
    ];
}
