<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuRepository;
use App\Containers\Admin\Menus\Data\Repositories\MenuTypeRepository;
use App\Containers\Core\Abstracts\Actions\Action;

class DestroyMenuTypeAction extends Action
{
    private MenuRepository $menuRepository;
    private MenuTypeRepository $menuTypeRepository;
    private array $ids;

    public function __construct(MenuRepository $menuRepository, MenuTypeRepository $menuTypeRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->menuTypeRepository = $menuTypeRepository;
        $this->ids = [];
    }

    public function run(): bool
    {
        $menuArray = $this->menuRepository->getAllMenu($this->external, ['id'])->toArray();

        foreach ($menuArray as $el) {
            $this->ids[] = $el['id'];
        }

        // If we don't have elements in this menu, delete this type of menu
        if (empty($this->ids)) {
            return $this->menuTypeRepository->destroyMenuType($this->external);
        }

        // If the menu has elements, delete all elements, and then delete the menu
        return $this->menuRepository->massiveDestroyByIds($this->ids) &&
               $this->menuTypeRepository->destroyMenuType($this->external);
    }
}
