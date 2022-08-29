<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Meeting
 *
 * @property int $id
 * @property string $meeting_id
 * @property string $topic
 * @property string|null $start_time
 * @property int $duration
 * @property string $password
 * @property string $start_url
 * @property string $join_url
 * @property string $mentor
 * @property string $email
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Meeting extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'meeting_id',
        'topic',
        'start_time',
        'duration',
        'password',
        'start_url',
        'join_url',
        'mentor',
        'email',
    ];
}
