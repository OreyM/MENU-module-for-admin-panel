<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuTypeRepository;
use App\Containers\Core\Abstracts\Actions\Action;

class GetMenuTypeIdBySlugAction extends Action
{
    public function __construct(MenuTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(): int
    {
        return $this->repository->getMenuTypeId('type', $this->external);
    }
}
