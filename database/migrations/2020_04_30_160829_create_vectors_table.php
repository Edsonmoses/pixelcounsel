<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vectors_title',256);
            $table->string('vectors_slug',100)->nullable();
            $table->text('vectors_body');
            $table->string('vectors_type')->nullable();
            $table->integer('posted_by')->nullable();
            $table->boolean('status')->nullable();
            $table->string('contributor')->nullable();
            $table->string('vectors_image')->nullable();
            $table->string('vectors_thumbnail')->nullable();
            $table->integer('visit_count')->nullable();
            $table->integer('downloads')->nullable();
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
        Schema::dropIfExists('vectors');
    }
}
