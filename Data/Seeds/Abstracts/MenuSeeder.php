<?php


namespace App\Containers\Admin\Menus\Data\Seeds\Abstracts;


use App\Containers\Admin\Menus\Model\AdminMenu;
use App\Containers\Admin\Menus\Models\Menu;
use App\Containers\Admin\Menus\Models\MenuType;
use App\Containers\Core\Abstracts\Data\Seeds\Seeder;

abstract class MenuSeeder extends Seeder
{
    protected int $position = 0;

    protected int $typeId;

    protected function createMenuType($name, string $type = null): int
    {
        return MenuType::create([
            'name' => trim($name),
            'type' => $type ?? \Str::slug($name),
        ])->id;
    }

    protected function separator($name, string $alias = null, string $icon = ''): void
    {
        Menu::create([
            'type_id'       => $this->typeId,
            'position'      => $this->position++,
            'name'          => trim($name),
            'alias'         => $alias ?? \Str::slug($name),
            'icon'          => $icon,
            'is_separator'  => true,
        ]);
    }

    protected function parentMenuLink($name, string $route, string $alias = null, string $icon = ''): int
    {
        return Menu::create([
            'type_id'   => $this->typeId,
            'position'  => $this->position++,
            'name'      => trim($name),
            'alias'     => $alias ?? \Str::slug($name),
            'route'     => $route,
            'icon'      => $icon,
        ])->id;
    }

    protected function childMenuLink(int $parentId, $name, string $route, string $alias = null, string $icon = ''): int
    {
        return Menu::create([
            'type_id'   => $this->typeId,
            'position'  => $this->position++,
            'parent_id' => $parentId,
            'name'      => trim($name),
            'alias'     => $alias ?? \Str::slug($name),
            'route'     => $route,
            'icon'      => $icon,
        ])->id;
    }
}
