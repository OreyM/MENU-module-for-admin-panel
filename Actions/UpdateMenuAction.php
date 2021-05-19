<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuRepository;
use App\Containers\Admin\Menus\Data\Requests\UpdateMenuRequest;
use App\Containers\Core\Abstracts\Actions\Action;

class UpdateMenuAction extends Action
{
    private $menu;

    public function __construct(MenuRepository $repository, UpdateMenuRequest $request)
    {
        $this->request = $request;
        $this->repository = $repository;
        $this->menu = [];
    }

    public function run(): void
    {
        $sourceMenu = json_decode($this->request->nested, false);

        $this->expandedTree($sourceMenu);

        foreach ($this->menu as $menu) {
            $this->repository->updateById($menu['id'], $menu);
        }
    }

    private function expandedTree($menu, $position = 0, $parrentId = null): void
    {
        foreach ($menu as $el) {
            $this->menu[] = [
                'id'            => $el->id,
                'type_id'       => $el->type_id,
                'parent_id'     => $parrentId ?? 0,
                'position'      => $position++,
                'name'          => $el->name,
                'alias'         => \Str::slug($el->name),
                'route'         => $el->route,
                'icon'          => $el->icon,
                'is_separator'  => $el->is_separator,
            ];

            if ($el->sub) {
                $this->expandedTree($el->sub, $position, $el->id);
            }
        }
    }
}
