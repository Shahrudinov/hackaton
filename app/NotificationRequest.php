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
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property bool $notificated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest whereNotificated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NotificationRequest whereUserId($value)
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
