<?php


namespace App\Containers\Admin\Menus\Data\Requests;


use App\Containers\Core\Abstracts\Data\Requests\Request;

/**
 * Class UpdateMenuTypeRequest
 * @package App\Containers\Admin\Menus\Data\Requests
 *
 * @property string $name
 * @property string $type
 */
class UpdateMenuTypeRequest extends Request
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:25', 'unique:menu_types'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('menus::message.update-menu-type-name-required'),
            'name.unique'   => trans('menus::message.update-menu-type-name-unique'),
            'name.max'      => trans('menus::message.update-menu-type-name-max'),
        ];
    }
}
