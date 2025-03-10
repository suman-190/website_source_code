<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

        /**
     * The colleges that belong to the College
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colleges()
    {
        return $this->belongsToMany(College::class,'college_courses','cource_id','college_id');
    }
}
