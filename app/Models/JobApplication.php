<?php

namespace App\Models;

use App\Models\Landing\LandingVacancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Product
 *
 * @property int $id
 * @porperty int $landing_vacancy_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $resume
 */
class JobApplication extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * One To One relation to the LandingVacancy Model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function landingVacancy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LandingVacancy::class);
    }
}
