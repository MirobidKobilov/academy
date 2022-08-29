<?php

namespace App\Models;

use App\Models\Landing\LandingMentor;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mentorProfile $mentorProfile
 * @property studentProfile $studentProfile
 *
 */
class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * One To One relation to the studentProfile Model
     *
     * @return  HasOne
     */
    public function studentProfile(): HasOne
    {
        return $this->hasOne(StudentProfile::class);
    }

    /**
     * @return HasMany
     */
    public function mentor(): HasMany
    {
        return $this->hasMany(LandingMentor::class);
    }

    public function canAccessFilament(): bool
    {
        return $this->hasVerifiedEmail();
    }

    /**
     * One To One relation to the mentorProfile Model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mentorProfile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(MentorProfile::class);
    }

}
