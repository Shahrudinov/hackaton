<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BookCategory
 *
 * @property int $id
 * @property int $book_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Book[] $books
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookCategory whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BookCategory extends Model
{
    protected $table = 'book_categories';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories', 'category_id');
    }
}
