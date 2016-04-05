<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title')->index();
            $table->text('intro');
            $table->boolean('is_carousel')->default(false);
            $table->string('page_image');
            $table->text('content');
            $table->timestamp('published_at');
            //0=>Under review 1=>Accepted 2=>Rejected
            $table->tinyInteger('is_checked')->default(0);
            $table->boolean('is_draft')->default(true);
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
        Schema::drop('articles');
    }
}
