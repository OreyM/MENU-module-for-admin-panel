<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('menu_types');

            $table->unsignedBigInteger('parent_id')->default(0);
            $table->integer('position');
            $table->string('name')->nullable();
            $table->string('alias');
            $table->string('route')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_separator')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
