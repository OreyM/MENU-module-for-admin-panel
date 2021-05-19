<?php


namespace App\Containers\Admin\Menus\Data\Objects;


class CmsMenuObject
{
    public bool $is_separator;
    public string $name;
    public string $route;
    public ?string $icon;

    public array $sub = [];
}
