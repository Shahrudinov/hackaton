<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\BookRequest
 *
 * @property-read \App\Book $book
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property int $count
 * @property bool $completed
 * @property string $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookRequest whereUserId($value)
 */
class BookRequest extends Model
{
    protected $table = 'book_requests';
    protected $fillable = [
        'user_id', 'book_id', 'count', 'completed', 'return_date'
    ];

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

    /**
     * @return Builder
     */
    public function completed()
    {
        return self::where('completed', true);
    }

    /**
     * @return Builder
     */
    public function incompleted()
    {
        return self::where('completed', false);
    }
}
