<?php


namespace App\Containers\Admin\Menus\Controllers\Web;


use App\Containers\Admin\Menus\Actions\GetAllMenuTypesAction;
use App\Containers\Core\Templates\Traits\PageControllerTrait;
use App\Containers\Core\Abstracts\Controllers\AdminController;
use Illuminate\View\View;

class MenuTypesPageController extends AdminController
{
    use PageControllerTrait;

    protected $permission = 'view-menu';

    public function index(): View
    {
        $this->composer = 'menus::pages.index';

        $this->setPageTitle(trans('menus::page.title'), trans('menus::page.title-prefix'));
        $this->setPageBreadcrump("{$this->adminUrl}.menu");

        $menuTypes = call(GetAllMenuTypesAction::class);

        return view($this->composer, compact('menuTypes'));
    }
}
