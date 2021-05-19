<?php


namespace App\Containers\Admin\Menus\Data\Requests;


use App\Containers\Core\Abstracts\Data\Requests\Request;

/**
 * Class CreateMenuTypesRequest
 * @package App\Containers\Admin\Menus\Data\Requests
 * @property int $id
 * @property string $name
 * @property string $slug
 */
class CreateMenuTypesRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:menu_types', 'max:25'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('menus::message.create-menu-type-name-required'),
            'name.unique'   => trans('menus::message.create-menu-type-name-unique'),
            'name.max'      => trans('menus::message.create-menu-type-name-max'),
        ];
    }
}
