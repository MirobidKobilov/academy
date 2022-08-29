<?php

namespace App\Models\Landing;

use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Langding page vacancies section tables
 * App\Models\Landing\LandingVacancy
 * @property string $title
 * @property string $short_text
 * @property string $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @var string[]
 *
 * @uses HasFactory
 */

class LandingVacancy extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobApplication(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
