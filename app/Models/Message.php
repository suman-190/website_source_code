<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    /**
     * Get the courses that owns the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courses()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
}
