<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email_address', 'phone_number', 'status', 'user_id', 'address'];

    /**
     * Get all of the reasults for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reasults(): HasMany
    {
        return $this->hasMany(StudentReasult::class, 'student_id', 'id');
    }

    /**
     * Get all of the setrequest for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function setrequest(): HasMany
    {
        return $this->hasMany(SetRequest::class, 'student_id', 'id');
    }
}
