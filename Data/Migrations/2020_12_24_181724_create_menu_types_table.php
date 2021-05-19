<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTypesTable extends Migration
{
    public function up()
    {
        Schema::create('menu_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_types');
    }
}
