<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'question_id',
        'correct_answers',
        'answers',
    ];
    use HasFactory;
}
