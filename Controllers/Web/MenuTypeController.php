<?php


namespace App\Containers\Admin\Menus\Controllers\Web;


use App\Containers\Admin\Menus\Actions\GetMenuTypeForUrlAction;
use App\Containers\Core\Abstracts\Controllers\AdminController;
use Illuminate\Http\RedirectResponse;

class MenuTypeController extends AdminController
{
    protected $permission = 'view-menu';

    /**
     * Go to the menu editing page, change the name of the menu type, set up the menu structure
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getMenuTypeForUrl(): RedirectResponse
    {
        $type = call(GetMenuTypeForUrlAction::class);

        return redirect()->route("{$this->adminUrl}.menu.edit", $type);
    }
}
