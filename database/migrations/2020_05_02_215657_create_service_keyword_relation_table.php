<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceKeywordRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_keyword_relation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('keyword_id');

            $table->unique(['post_id', 'keyword_id']);

            $table->timestamps();
        });

        Schema::table('service_keyword_relation', function (Blueprint $table) {
            $table->foreign('post_id')
                ->on('posts')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('keyword_id')
                ->on('keywords')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_keyword_relation');
    }
}
