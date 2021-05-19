<?php


namespace App\Containers\Admin\Menus\Data\Repositories;


use App\Containers\Admin\Menus\Models\Menu;
use App\Containers\Core\Abstracts\Data\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;

class MenuRepository extends Repository
{
    protected $model = Menu::class;

    /**
     * Getting all menu elements as an array
     * @param string $type
     * @param array $columns
     * @return Collection
     */
    public function getAllMenu(string $type, array $columns = ['*']): Collection
    {
        return $this->model->select($columns)->whereHas('type', static function ($query) use ($type) {
            $query->select('type')->where('type', $type);
        })->with('type')
            ->get();
    }

    public function getChildMenuElement(int $menuElementId)
    {
        return $this->model->where('parent_id', $menuElementId)->get();;
    }

    public function updateById(int $id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function createNewElement(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (QueryException $e) {
            return $e;
        }
    }

    /**
     * Getting all menu elements as a tree
     * @param string $type
     * @param string $orderBy
     * @return Collection
     */
    public function getMenuTree(string $type, $orderBy = 'position'): Collection
    {
        $collection = $this->model->whereHas('type', static function ($query) use ($type) {
            $query->select('type')->where('type', $type);
        })->with('type')
            ->orderBy($orderBy)
            ->get();

        return $this->buildTree($collection);
    }

    private function buildTree(Collection $collection, int $pid = 0): Collection
    {
        $result = $collection->filter(static function(Menu $item) use ($pid){
            return $item->parent_id === $pid;
        });

        foreach ($result as $key => $model) {
            $model->sub = $this->buildTree($collection, $model->id);
        }

        return $result;
    }
}
