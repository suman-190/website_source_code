<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',        // Name of the student
        'faculty',     // Faculty or program
        'college',     // College name
        'image',       // Path to the image
        'description', // Success story description
    ];
}
