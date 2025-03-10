<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SetRequest extends Model
{
    use HasFactory;
    protected $fillable = ['set_id', 'student_id', 'is_approved'];
    /**
     * Get the student that owns the SetRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    /**
     * Get the set that owns the SetRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function set(): BelongsTo
    {
        return $this->belongsTo(ExamSet::class, 'set_id', 'id');
    }
}
