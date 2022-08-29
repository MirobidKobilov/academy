<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Langding page prices section tables
 * App\Models\Landing\LandingPrice
 * @property string $price_title
 * @property string $price_desc
 * @property string $price_amount
 * @property string $price_options
 * @property string $price_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @var string[]
 *
 * @uses HasFactory
 */

class LandingPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_title',
        'price_desc',
        'price_amount',
        'price_name',
        'price_options',
    ];
}
