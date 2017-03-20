<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->string('metatitle',50);
            $table->string('metakeyword',200);
            $table->integer('category_id');
            $table->string('image',250);
            $table->string('description',500);
            $table->longText('detail');
            $table->string('tag',500);
            $table->string('createdby',150);
            $table->string('updatedby',150);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('posts');
    }
}
