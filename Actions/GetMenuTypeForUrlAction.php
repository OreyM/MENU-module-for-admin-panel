<?php


namespace App\Containers\Admin\Menus\Actions;


use App\Containers\Admin\Menus\Data\Requests\GetMenuTypeForUrlRequest;
use App\Containers\Core\Abstracts\Actions\Action;

class GetMenuTypeForUrlAction extends Action
{
    public function __construct(GetMenuTypeForUrlRequest $request)
    {
        $this->request = $request;
    }

    public function run(): string
    {
        return $this->request->type;
    }
}
