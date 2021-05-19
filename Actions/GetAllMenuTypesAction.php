<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Models\MenuType;
use App\Containers\Admin\Menus\Data\Repositories\MenuTypeRepository;
use App\Containers\Admin\Menus\Data\Mappers\MenuTypeMapper;
use App\Containers\Admin\Roles\Models\Role;
use App\Containers\Core\Abstracts\Actions\Action;
use Illuminate\Support\Collection;

class GetAllMenuTypesAction extends Action
{
    public function __construct(MenuTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(): Collection
    {
        if (Role::isSuperAdmin()) {
            return $this->repository->allMenuTypes()->map(static function (MenuType $item) {
                return new MenuTypeMapper($item);
            });
        }

        return $this->repository->allMenuTypesWhithoutAdminMenu()->map(static function (MenuType $item) {
            return new MenuTypeMapper($item);
        });
    }
}
