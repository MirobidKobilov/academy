<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string $phone
 * @property string $city
 * @property string $address
 * @property integer $TIN
 * @property string $passport_series
 * @property integer $passport_number
 * @property string $subject
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id',
            'first_name',
            'middle_name',
            'last_name',
            'date_of_birth',
            'phone',
            'city',
            'address',
            'TIN',
            'passport_series',
            'passport_number',
            'subject',
    ];

    protected $guarded = [];
    /**
     * One To One relation to the User Model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
