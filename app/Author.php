<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Author
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereUpdatedAt($value)
 */
class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = [
        'name', 'link'
    ];
}
