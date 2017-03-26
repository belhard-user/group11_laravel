<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitBlogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createArticlesTable();
        $this->createTagsTable();
        $this->createPivotTable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_tag', function(Blueprint $table){
            $table->dropForeign(['article_id']);
            $table->dropForeign(['tag_id']);
            $table->dropIndex('article_tag_article_id_index');
            $table->dropIndex('article_tag_tag_id_index');
        });
        Schema::dropIfExists('articles');
        Schema::dropIfExists('tags');

        Schema::dropIfExists('article_tag');
    }

    private function createTagsTable()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
        });
    }

    private function createArticlesTable()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->string('slug', 255);
            $table->text('short_description');
            $table->text('description');
            $table->timestamps();
        });
    }

    private function createPivotTable()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}
