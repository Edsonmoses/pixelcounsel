<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('events_title',256);
            $table->string('events_subtitle',256);
            $table->string('events_slug',100)->nullable();
            $table->text('events_body');
            $table->string('events_type')->nullable();
            $table->string('events_date')->nullable();
            $table->integer('posted_by')->nullable();
            $table->string('events_image')->nullable();
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
        Schema::dropIfExists('events');
    }
}
