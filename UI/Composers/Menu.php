<?php


namespace App\Containers\Admin\Menus\UI\Composers;


use App\Containers\Admin\Menus\Actions\GetSomeMenuByTypeJsonAction;
use Illuminate\View\View;

class Menu
{
    public static function render(string $menuType, string $view, array $params = []): View
    {
        $menu = json_decode(call(GetSomeMenuByTypeJsonAction::class, $menuType));

        switch ($view) {
            case 'bs4':
                return view('menus::components.menus.bs4-menu', compact('menu'));
            default:
                return view('menus::components.menus.' . $view, compact('menu', 'view'));
        }
    }
}
