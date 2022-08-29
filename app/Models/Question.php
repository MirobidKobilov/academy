<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'section_id',
        'title',
    ];
    use HasFactory;

     public function answer(){
         return $this->hasMany(Answer::class);
     }
}
