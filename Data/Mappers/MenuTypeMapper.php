<?php


namespace App\Containers\Admin\Menus\Data\Mappers;


use App\Containers\Core\Abstracts\Data\Mappers\Mapper;

class MenuTypeMapper extends Mapper
{
    private int $id;
    private string $name;
    private string $type;

    protected function transform(): void
    {
        $this->id   = $this->data->id;
        $this->name = $this->data->name;
        $this->type = $this->data->type;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }
}
