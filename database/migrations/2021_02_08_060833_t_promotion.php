<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TPromotion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_promotion', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('latitude',100)->nullable();
            $table->string('longitude',100)->nullable();
            $table->string('title_long',100)->nullable();
            $table->string('title_short',70)->nullable();
            $table->text('description')->nullable();
            $table->string('title_main',100)->nullable();
            $table->datetime('end_time');
            $table->datetime('fech_crea');
            $table->integer('status')->unsigned()->nullable();
            $table->string('type',45)->nullable();
            $table->string('discount',5)->nullable();
            $table->string('contact_info',200)->nullable();
            $table->integer('id_user')->nullable();
            $table->string('city',20)->nullable();
        });

        DB::statement('ALTER TABLE t_promotion MODIFY COLUMN id INTEGER (30) UNSIGNED NOT NULL AUTO_INCREMENT;');
        DB::statement('ALTER TABLE t_promotion MODIFY COLUMN status INTEGER (30) UNSIGNED;');
        DB::statement('ALTER TABLE t_promotion MODIFY COLUMN id_user INTEGER (10);');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_promotion');
    }
}
