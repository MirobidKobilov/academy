<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $casts = [
        'resolution' => 'array',
    ];
    protected $fillable = [
        'title',
        'descriptions',
        'status',
        'resolution',
    ];

    public function section()
    {
        return $this->hasMany(Section::class);
    }
}
