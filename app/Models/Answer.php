<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'answer_title',
        'answer_image',
        'answer_audio',
        'answer_index',
        'question_id',
    ];
}
