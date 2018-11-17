<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
