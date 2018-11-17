<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BookHistory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property int $action_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory whereActionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookHistory whereUserId($value)
 */
class BookHistory extends Model
{
    protected $table = 'book_history';
    protected $fillable = [
        'user_id', 'book_id', 'action_id'
    ];
}
