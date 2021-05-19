<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Objects\CmsMenuObject;
use App\Containers\Core\Abstracts\Actions\Action;

class GetCmsMenuAction extends Action
{
    private array $cmsMenu;

    public function __construct()
    {
        $this->cmsMenu = [];
    }

    public function run(): array
    {
        $config = config('menus.cms');

        foreach ($config as $menuElement) {
            $this->cmsMenu[] = $this->cmsMenuTree($menuElement);
        }

        return $this->cmsMenu;
    }

    private function cmsMenuTree(array $menuElement): CmsMenuObject
    {
        $element = new CmsMenuObject();

        $element->is_separator  = $menuElement['is_separator'] ?? false;
        $element->name          = $menuElement['name'];
        $element->route         = $menuElement['route'] ?? 'javascript: void(0);';
        $element->icon          = $menuElement['icon'];

        if (array_key_exists('child', $menuElement)) {
            foreach ($menuElement['child'] as $childElement) {
                $element->sub[] = $this->cmsMenuTree($childElement);
            }
        }

        return $element;
    }
}
