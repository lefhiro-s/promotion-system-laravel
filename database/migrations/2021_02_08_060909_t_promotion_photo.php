<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TPromotionPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_promotion_photo', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('url',300);
            $table->integer('id_promotion');
        });

        DB::statement('ALTER TABLE t_promotion_photo MODIFY COLUMN id INTEGER (30) UNSIGNED NOT NULL AUTO_INCREMENT;');
        DB::statement('ALTER TABLE t_promotion_photo MODIFY COLUMN id_promotion INTEGER (30) NOT NULL;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_promotion_photo');
    }
}
