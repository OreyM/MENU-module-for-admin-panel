<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuRepository;
use App\Containers\Admin\Menus\Data\Requests\AddMenuElementRequest;
use App\Containers\Core\Abstracts\Actions\Action;

class AddMenuElementAction extends Action
{
    public function __construct(AddMenuElementRequest $request, MenuRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->createNewElement([
            'type_id'       => $this->external,
            'parent_id'     => 0,
            'position'      => 0,
            'name'          => $this->request->name,
            'alias'         => \Str::slug($this->request->name),
            'route'         => $this->request->route ?? null,
            'icon'          => $this->request->icon ?? null,
            'is_separator'  => (bool) $this->request->is_separator,
        ]);
    }
}
