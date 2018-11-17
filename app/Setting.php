<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Setting
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereValue($value)
 */
class Setting extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value'];
}
