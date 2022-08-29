<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Langding page home section tables
 * App\Models\Landing\LandingHome
 * @property string $title
 * @property string $title_2
 * @property string $hero_image
 * @property string $hero_image_2
 * @property string $content
 * @property string $content_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @var string[]
 *
 * @uses HasFactory
 */


class LandingHome extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_2',
        'hero_image',
        'hero_image_2',
        'content',
        'content_2',
    ];

}
