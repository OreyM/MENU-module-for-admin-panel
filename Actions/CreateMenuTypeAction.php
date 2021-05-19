<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuTypeRepository;
use App\Containers\Admin\Menus\Data\Requests\CreateMenuTypesRequest;
use App\Containers\Core\Abstracts\Actions\Action;

class CreateMenuTypeAction extends Action
{
    public function __construct(CreateMenuTypesRequest $request, MenuTypeRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    public function run()
    {
        return  $this->repository->createMenuType([
            'name' => $this->request->name,
            'type' => \Str::slug($this->request->name),
        ]);
    }
}
