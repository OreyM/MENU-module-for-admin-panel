<?php


namespace App\Containers\Admin\Menus\Data\Requests;


use App\Containers\Core\Abstracts\Data\Requests\Request;

/**
 * Class AddMenuElementRequest
 * @package App\Containers\Admin\Menus\Data\Requests
 * @property string $name
 * @property string $route
 * @property string $icon
 * @property bool is_separator
 */
class AddMenuElementRequest extends Request
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('menus::message.menu-element-name-required'),
        ];
    }
}
