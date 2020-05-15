<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHookupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hookups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company',256);
            $table->string('job_slug',100)->nullable();
            $table->string('position')->nullable();
            $table->text('job_description');
            $table->string('job_locations')->nullable();
            $table->integer('posted_by')->nullable();
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
        Schema::dropIfExists('hookups');
    }
}
