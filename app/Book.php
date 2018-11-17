<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Book
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $title
 * @property string|null $author
 * @property string|null $year
 * @property string|null $image
 * @property int|null $count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Author[] $authors
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereYear($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\BookRequest[] $requests
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UserBook[] $userBooks
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereDescription($value)
 */
class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'author', 'year', 'image', 'count'];

    /**
     * Book categories
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Author list
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userBooks()
    {
        return $this->hasMany(UserBook::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests()
    {
        return $this->hasMany(BookRequest::class);
    }
}
