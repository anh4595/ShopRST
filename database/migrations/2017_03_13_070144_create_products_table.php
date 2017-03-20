<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('metatitle',100);
            $table->string('metakeyword',500);
            $table->integer('quantity');
            $table->integer('quantitysold');
            $table->decimal('price');
            $table->decimal('promotionprice');
            $table->string('image');
            $table->longText('moreimage');
            $table->integer('tag_id');
            $table->string('description');
            $table->longText('detail');
            $table->tinyInteger('hotflag');
            $table->datetime('create_date');
            $table->integer('viewcount');
            $table->string('create_by');
            $table->string('update_by');
            $table->tinyInteger('status');
            $table->tinyInteger('homeflag');
            $table->tinyInteger('promotionflag');
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
        Schema::dropIfExists('products');
    }
}
