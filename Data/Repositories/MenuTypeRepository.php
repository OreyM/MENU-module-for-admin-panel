<?php


namespace App\Containers\Admin\Menus\Data\Repositories;


use App\Containers\Admin\Menus\Exceptions\MenuTypeNotCreateException;
use App\Containers\Admin\Menus\Exceptions\MenuTypeNotDestroyedException;
use App\Containers\Admin\Menus\Exceptions\MenuTypeNotUpdatedException;
use App\Containers\Admin\Menus\Models\MenuType;
use App\Containers\Core\Abstracts\Data\Repositories\Repository;

class MenuTypeRepository extends Repository
{
    protected $model = MenuType::class;

    public function allMenuTypes()
    {
        return $this->model->all();
    }

    public function allMenuTypesWhithoutAdminMenu()
    {
        return $this->model->whereNotIn('type', [$this->model::ADMIN_MENU_TYPE])->get();
    }

    public function createMenuType(array $data)
    {
        try {
            $result = $this->model->create($data);
            return $result->type;
        } catch (MenuTypeNotCreateException $e) {

        }
    }

    public function getMenuTypeId(string $colume, $value): int
    {
        return $this->model->where($colume, $value)
            ->first()->id;
    }

    /**
     * Получаем имя типа меню
     * @param string $colume имя колонки для поиска в БД
     * @param $value искомое значение
     * @return string
     */
    public function getMenuTypeName(string $colume, $value): string
    {
        return $this->model->select(['name', 'type'])
                    ->where($colume, $value)
                    ->first()->name;
    }

    /**
     * @param string $type
     * @param array $data
     * @return bool
     */
    public function updateMenuType(string $type, array $data): bool
    {
        try {
            return $this->model->where('type', $type)->update($data);
        } catch (MenuTypeNotUpdatedException $e) {

        }

        return false;
    }

    public function destroyMenuType(string $type): bool
    {
        try {
            return $this->model->where('type', $type)->delete();
        } catch (MenuTypeNotDestroyedException $e) {

        }

        return false;
    }
}
