<?php


namespace App\Containers\Admin\Menus\Controllers\Web;


use App\Containers\Admin\Menus\Actions\DestroyMenuTypeAction;
use App\Containers\Core\Abstracts\Controllers\AdminController;

class DeletionMenuTypeController extends AdminController
{
    protected $permission = 'delete-menu';

    public function destroy(string $type)
    {
        if (call(DestroyMenuTypeAction::class, $type)) {
            return redirect()->route("{$this->adminUrl}.menu")
                ->with('success', trans('menus::message.delete-menu'));
        }

        return redirect()->route("{$this->adminUrl}.menu.edit", $type)
            ->with('error', trans('menus::message.error-delete-menu'));
    }
}
