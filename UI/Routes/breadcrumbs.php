<?php
use Diglactic\Breadcrumbs\Generator;

$admin = config('app.admin_url');

/**
 * Menu
 */
Breadcrumbs::for("{$admin}.menu", static function (Generator $trail) use ($admin) {
    $trail->parent("{$admin}.dashboard");
    $trail->push(trans('menus::breadcrumbs.index'), route("{$admin}.menu"));
});
Breadcrumbs::for("{$admin}.menu.edit", static function (Generator $trail, $name, $typeId) use ($admin) {
    $trail->parent("{$admin}.menu");
    $trail->push(trans('menus::breadcrumbs.edit', ['name' => $name]), route("{$admin}.menu.edit", $typeId));
});
