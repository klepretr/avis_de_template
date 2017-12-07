<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('incident_category');
            $table->string('place');
            $table->integer('valid');
            $table->integer('over');
            $table->timestamps();

            // $table->foreign('incident_category')
            //     ->references('id')
            //     ->on('incident_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('incidents', function (Blueprint $table) {
        //     $table->dropForeign('incident_incident_category_foreign');
        // });

        Schema::dropIfExists('incidents');
    }
}
