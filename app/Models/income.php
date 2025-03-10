<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\clent;


class income extends Model
{
    use HasFactory;

    /**
     * Get the clientname that owns the income
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientname()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}
