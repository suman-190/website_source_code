<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_title',
        'question_image',
        'question_audio',
        'question_type',
        'correct_answer',
        'status',
        'exam_set_id'
    ];

    /**
     * Get the examset that owns the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examset(): BelongsTo
    {
        return $this->belongsTo(ExamSet::class, 'exam_set_id', 'id');
    }
    /**
     * Get all of the answers for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id', 'id')->orderBy('answer_index', 'asc');
    }

    /**
     * Get the correctanswer associated with the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function correctanswer(): HasOne
    {
        return $this->hasOne(Answer::class, 'question_id', 'id')->where('answer_index', $this->correct_answer);
    }
}
