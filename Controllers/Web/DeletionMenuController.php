<?php


namespace App\Containers\Admin\Menus\Controllers\Web;


use App\Containers\Admin\Menus\Actions\DestroyMenuElementAction;
use App\Containers\Core\Abstracts\Controllers\AdminController;
use Illuminate\Http\RedirectResponse;

class DeletionMenuController extends AdminController
{
    protected $permission = 'delete-menu';

    public function destroy (int $elementId): RedirectResponse
    {
        if (call(DestroyMenuElementAction::class, $elementId)) {
            return back()->with('success', trans('menus::message.delete-menu-element'));
        }

        return back()->with('error', trans('menus::message.error-delete-menu-element'));
    }
}
