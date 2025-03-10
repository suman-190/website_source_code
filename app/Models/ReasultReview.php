<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReasultReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'given_answer',
        'is_correct',
        'attempt',
        'student_reasult_id',
        'question_id'
    ];

    /**
     * Get the question that owns the ReasultReview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
