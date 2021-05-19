<?php

use App\Containers\Admin\Menus\Controllers\Web\CreationMenuController;
use App\Containers\Admin\Menus\Controllers\Web\CreationMenuTypeController;
use App\Containers\Admin\Menus\Controllers\Web\DeletionMenuController;
use App\Containers\Admin\Menus\Controllers\Web\DeletionMenuTypeController;
use App\Containers\Admin\Menus\Controllers\Web\MenuTypeController;
use App\Containers\Admin\Menus\Controllers\Web\MenuTypePageController;
use App\Containers\Admin\Menus\Controllers\Web\MenuTypesPageController;

$admin = config('app.admin_url');

Route::middleware('web')
    ->prefix($admin)
    ->as("{$admin}.")
    ->group(static function () {

        Route::group([
            'prefix' => 'menu',
            'as' => 'menu',
        ], static function () {
            Route::get('', [MenuTypesPageController::class, 'index'])->name('');
            Route::get('{type}/edit', [MenuTypePageController::class, 'edit'])->name('.edit');

            /**
             * Работа с типом меню
             */
            Route::group([
                'prefix' => 'type',
                'as' => '.type.',
            ], static function () {
                Route::post('create', [CreationMenuTypeController::class, 'create'])->name('create');
                Route::get('url', [MenuTypeController::class, 'getMenuTypeForUrl'])->name('url');
                Route::put('edit/{type}/update', [CreationMenuTypeController::class, 'update'])->name('update');
                Route::delete('edit/{type}', [DeletionMenuTypeController::class, 'destroy'])->name('destroy');
            });

            /**
             * Работа со структурой меню
             */
            Route::group([
                'prefix' => 'edit',
            ], static function () {
                Route::put('{type}/update', [CreationMenuController::class, 'update'])->name('.update');
                Route::post('{type}/add', [CreationMenuController::class, 'add'])->name('.add');
                Route::delete('{type}', [DeletionMenuController::class, 'destroy'])->name('.destroy');
            });
        });

    });
