<?php

namespace App\Models\Landing;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Langding page mentors section tables
 * App\Models\Landing\LandingMentor
 * @property string $mentor_title
 * @property string $mentor_desc
 * @property string $mentor_image
 * @property string $mentor_subject_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @var string[]
 *
 * @uses HasFactory
 */

class LandingMentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_title',
        'mentor_desc',
        'mentor_subject_image',
        'mentor_image',
        'user_id',
    ];


    /**
     * @return BelongsTo
     */
    public function  user():BelongsTo
    {
       return $this->belongsTo(User::class);
    }
}
