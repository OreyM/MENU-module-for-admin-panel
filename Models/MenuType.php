<?php

namespace App\Containers\Admin\Menus\Models;


use App\Containers\Core\Abstracts\Models\Model;

/**
 * App\Containers\Admin\Menus\Models\MenuType
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereType($value)
 * @mixin \Eloquent
 */
class MenuType extends Model
{
    public $timestamps = false;

    protected $table = 'menu_types';

    protected $fillable = [
        'name',
        'type',
    ];
}
