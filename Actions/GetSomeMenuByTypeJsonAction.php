<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuRepository;
use App\Containers\Core\Abstracts\Actions\Action;

class GetSomeMenuByTypeJsonAction extends Action
{
    public function __construct(MenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(): string
    {
        $menu = $this->repository->getMenuTree($this->external);

        return json_encode($this->toArray($menu));
    }

    private function toArray($menu): array
    {
        $result = [];

        foreach ($menu as $el) {
            if (!empty($el->sub)) {
                $el->sub = $this->toArray($el->sub);
            }
            $result[] = $el;
        }

        return $result;
    }
}
