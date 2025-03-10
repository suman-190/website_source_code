<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adsposition extends Model
{
    use HasFactory;

    /**
     * Get all of the ads for the Adsposition
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    //hasmanu relaton
    public function ads()
    {
        return $this->hasMany(Ads::class, 'adsposition_id', 'id')->orderByDesc('id');
    }
}
