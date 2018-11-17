<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BookActions
 *
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookActions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookActions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookActions query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookActions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BookActions whereTitle($value)
 * @mixin \Eloquent
 */
class BookActions extends Model
{
    public const ACTION_TAKE = 'TAKE';
    public const ACTION_RETURN = 'RETURN';
}
