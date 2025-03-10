<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentReasult extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'set_id',
        'attempt'
    ];

    /**
     * Get the examset that owns the StudentReasult
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examset(): BelongsTo
    {
        return $this->belongsTo(ExamSet::class, 'set_id', 'id');
    }

    /**
     * Get all of the reasultReview for the StudentReasult
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reasultreview(): HasMany
    {
        return $this->hasMany(ReasultReview::class, 'student_reasult_id', 'id');
    }

    /**
     * Get the student that owns the StudentReasult
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
