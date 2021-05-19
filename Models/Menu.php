<?php

namespace App\Containers\Admin\Menus\Models;


use App\Containers\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * App\Containers\Admin\Menus\Models\Menu
 *
 * @property int $id
 * @property int $type_id
 * @property int $parent_id
 * @property int $position
 * @property string|null $name
 * @property string $alias
 * @property string|null $route
 * @property string|null $icon
 * @property int $is_separator
 * @property-read \App\Containers\Admin\Menus\Models\MenuType $type
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIsSeparator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTypeId($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    public $timestamps = false;

    protected $table = 'menus';

    protected $fillable = [
        'type_id',
        'parent_id',
        'position',
        'name',
        'alias',
        'route',
        'icon',
        'is_separator',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(MenuType::class);
    }
}
