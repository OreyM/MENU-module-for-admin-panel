<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuRepository;
use App\Containers\Core\Abstracts\Actions\Action;
use Illuminate\Database\Eloquent\Collection;

class GetSomeMenuByTypeAction extends Action
{
    public function __construct(MenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(): Collection
    {
        return $this->repository->getAllMenu($this->external);
    }
}
