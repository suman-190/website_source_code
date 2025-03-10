<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExamSet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'time_period',
        'start_from',
        'end_on',
        'status',
        'subject_id',
    ];

    /**
     * Get all of the questions for the ExamSet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'exam_set_id', 'id');
    }

    /**
     * Get all of the attempt for the ExamSet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attempt(): HasMany
    {
        return $this->hasMany(StudentReasult::class, 'set_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Category::class, 'subject_id', 'id');
    }
}
