<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Langding page about section tables
 * App\Models\Landing\LandingAbout

 * @property string $about_title
 * @property string $about_short
 * @property string $about_desc
 * @property string $about_bg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @var string[]
 *
 * @uses HasFactory
 */

class LandingAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_title',
        'about_short',
        'about_desc',
        'about_bg',

    ];
}
