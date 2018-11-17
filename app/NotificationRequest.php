<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\NotificationRequest
 *
 * @property-read \App\Book $book
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest query()
 * @mixin \Eloquent
 */
class NotificationRequest extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
