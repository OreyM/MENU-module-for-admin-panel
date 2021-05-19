<?php


namespace App\Containers\Admin\Menus\Controllers\Web;


use App\Containers\Admin\Menus\Actions\CreateMenuTypeAction;
use App\Containers\Admin\Menus\Actions\UpdateMenuTypeAction;
use App\Containers\Core\Abstracts\Controllers\AdminController;
use Illuminate\Http\RedirectResponse;

class CreationMenuTypeController extends AdminController
{
    protected $permission = 'edit-menu';

    public function create(): RedirectResponse
    {
        if ($type = call(CreateMenuTypeAction::class)) {

            return redirect()->route("{$this->adminUrl}.menu.edit", $type)
                ->with('success', trans('menus::message.create-new-menu-type'));
        }

        return redirect()->route("{$this->adminUrl}.menu")
            ->with('success', trans('menus::message.error-create-new-menu-type'));
    }

    public function update(string $type): RedirectResponse
    {
        if ($newType = call(UpdateMenuTypeAction::class, $type)) {
            return redirect()->route("{$this->adminUrl}.menu.edit", $newType)
                ->with('success', trans('menus::message.update-menu-type'));
        }

        return redirect()->route("{$this->adminUrl}.menu.edit", $type)
            ->with('error', trans('menus::message.error-update-menu-type'));
    }
}
