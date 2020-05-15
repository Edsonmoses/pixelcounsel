<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJargonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jargons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jargon_title',256);
            $table->string('jargon_slug',100)->nullable();
            $table->text('jargon_body');
            $table->integer('posted_by')->nullable();
            $table->string('jargon_image')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('visit_count')->nullable();
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
        Schema::dropIfExists('jargons');
    }
}
