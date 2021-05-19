<?php


namespace App\Containers\Admin\Menus\Data\Requests;


use App\Containers\Core\Abstracts\Data\Requests\Request;

/**
 * Class GetMenuTypeForUrlRequest
 * @package App\Containers\Admin\Menus\Data\Requests
 * @property string $type
 */
class GetMenuTypeForUrlRequest extends Request
{
    public function rules(): array
    {
        return [
            'type' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => trans('menus::message.menu-type-required'),
        ];
    }
}
