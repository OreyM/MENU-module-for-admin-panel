<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuTypeRepository;
use App\Containers\Admin\Menus\Data\Requests\UpdateMenuTypeRequest;
use App\Containers\Core\Abstracts\Actions\Action;

class UpdateMenuTypeAction extends Action
{
    public function __construct(UpdateMenuTypeRequest $request, MenuTypeRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @param string $type
     * @return bool|string
     */
    public function run()
    {
        if ($this->external === 'admin-menu') {
            return false;
        }

        $result =  $this->repository->updateMenuType($this->external, [
            'name' => $this->request->name,
            'type' => $this->external = \Str::slug($this->request->name),
        ]);

        if ($result) {
            return $this->external;
        }

        return false;
    }
}
