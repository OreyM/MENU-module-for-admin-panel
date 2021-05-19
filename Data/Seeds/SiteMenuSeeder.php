<?php


namespace App\Containers\Admin\Menus\Data\Seeds;


use App\Containers\Admin\Menus\Data\Seeds\Abstracts\MenuSeeder;

class SiteMenuSeeder extends MenuSeeder
{
    public function run(): void
    {
        $this->typeId = $this->createMenuType('Меню сайта', 'site-menu');

//        $this->parentMenuLink('Front page', 'front-page');
//        $this->separator('System');
//        $parentId = $this->parentMenuLink('Users', 'javascript: void(0);', 'la la-user-secret');
//        $this->childMenuLink($parentId, 'Employees', 'javascript: void(0);');
//        $childId = $this->childMenuLink($parentId, 'Roles', 'javascript: void(0);');
//            $this->childMenuLink($childId, 'Permissions', 'javascript: void(0);');

        $this->parentMenuLink('Über uns', '#about');
        $this->parentMenuLink('Unsere Leistungen', '#services');
        $this->parentMenuLink('Wie wir arbeiten', '#faq');
        $this->parentMenuLink('Beziehung', '#contact');
    }
}
