<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\UserBook
 *
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property int $count
 * @property string $return_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook whereReturnDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook whereUserId($value)
 * @mixin \Eloquent
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserBook whereStatus($value)
 */
class UserBook extends Model
{
    public const STATUS_RETURNED = 'RETURNED';
    public const STATUS_TAKEN = 'TAKEN';

    protected $table = 'user_books';
    protected $fillable = [
        'user_id', 'book_id', 'count', 'return_date', 'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
