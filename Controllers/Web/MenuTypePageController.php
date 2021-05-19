<?php


namespace App\Containers\Admin\Menus\Controllers\Web;


use App\Containers\Admin\Menus\Actions\GetMenuTypeIdBySlugAction;
use App\Containers\Admin\Menus\Actions\GetMenuTypeNameBySlugAction;
use App\Containers\Admin\Menus\Actions\GetSomeMenuByTypeAction;
use App\Containers\Admin\Menus\Actions\GetSomeMenuByTypeJsonAction;
use App\Containers\Core\Templates\Traits\PageControllerTrait;
use App\Containers\Core\Abstracts\Controllers\AdminController;
use Illuminate\View\View;

class MenuTypePageController extends AdminController
{
    use PageControllerTrait;

    protected $permission = 'edit-menu';

    public function edit(string $type): View
    {
        $this->composer = 'menus::pages.edit';

        $menu = call(GetSomeMenuByTypeJsonAction::class, $type);
        $menuForModal = call(GetSomeMenuByTypeAction::class, $type);
        $typeId = call(GetMenuTypeIdBySlugAction::class, $type);
        $typeName = call(GetMenuTypeNameBySlugAction::class, $type);

        $this->setPageTitle($typeName, trans('menus::page.edit-title-prefix'));
        $this->setPageBreadcrump("{$this->adminUrl}.menu.edit", $typeName, $type);

        return view($this->composer, compact('menu', 'menuForModal', 'typeId', 'typeName', 'type'));
    }
}
