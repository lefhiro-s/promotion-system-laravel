<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TPromotionItem extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_promotion_item', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->integer('id_promotion');
            $table->decimal('price',15,2);
            $table->integer('total_sale');
            $table->string('title',100);
            $table->integer('quantity');
            $table->decimal('total_pay',7,2)->nullable();
            $table->decimal('comission_site',7,2)->nullable();
        });

        DB::statement('ALTER TABLE t_promotion_item MODIFY COLUMN id INTEGER (30) UNSIGNED NOT NULL AUTO_INCREMENT;');
        DB::statement('ALTER TABLE t_promotion_item MODIFY COLUMN id_promotion INTEGER (30) NOT NULL;');
        DB::statement('ALTER TABLE t_promotion_item MODIFY COLUMN total_sale INTEGER (30) NOT NULL;');
        DB::statement('ALTER TABLE t_promotion_item MODIFY COLUMN quantity INTEGER (50) NOT NULL;');

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_promotion_item');
    }
}
