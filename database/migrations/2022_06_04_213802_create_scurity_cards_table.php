<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('scurity_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('berth_date');
            $table->string('type_scur');
            $table->string('phone');
            $table->string('dir_work');
            $table->bigInteger('num-card');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('expire')->default(0);

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scurity_cards');
    }
};
