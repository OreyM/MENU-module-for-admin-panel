<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Repositories\MenuRepository;
use App\Containers\Core\Abstracts\Actions\Action;
use Illuminate\Database\Eloquent\Collection;

class DestroyMenuElementAction extends Action
{
    private Collection $childs;

    public function __construct(MenuRepository $repository)
    {
        $this->repository = $repository;
        $this->childs = new Collection();
    }

    public function run(): bool
    {
        $childs = $this->childs($this->external);

        if (!$childs->isEmpty()) {
            $this->repository->massiveDestroyByIds($childs->toArray());
        }

        return $this->repository->destroyById($this->external);
    }

    private function childs(int $parentId): Collection
    {
        $childs = $this->repository->getChildMenuElement($parentId);

        if (!$childs->isEmpty()) {
            foreach ($childs as $child) {
                $this->childs->add($child->id);
                $this->childs($child->id); // checking nested sub children elements
            }
        }

        return $this->childs;
    }
}
