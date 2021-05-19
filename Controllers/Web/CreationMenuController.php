<?php


namespace App\Containers\Admin\Menus\Controllers\Web;


use App\Containers\Admin\Menus\Actions\AddMenuElementAction;
use App\Containers\Admin\Menus\Actions\UpdateMenuAction;
use App\Containers\Core\Abstracts\Controllers\AdminController;
use Illuminate\Http\RedirectResponse;

class CreationMenuController extends AdminController
{
    protected $permission = 'edit-menu';

    public function add(int $menuTypeId): RedirectResponse
    {
        $result = call(AddMenuElementAction::class, $menuTypeId);

        if ($result->errorInfo) {
            return back()->with('error', $result->getMessage());
        }

        return back()->with('success', trans('menus::message.add-new-menu-element'));
    }

    public function update(string $type): RedirectResponse
    {
        call(UpdateMenuAction::class, $type);

        return back()->with('success', trans('menus::message.menu-is-updated'));
    }
}
