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
            $table->string('title');
            $table->integer('organizer');
            $table->longText('description');
            $table->integer('event_category');
            $table->integer('street_number');
            $table->string('street_name');
            $table->string('city');
            $table->timestamp('end_at');
            $table->timestamps();

            // $table->foreign('event_category')
            //     ->references('id')
            //     ->on('event_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('events', function (Blueprint $table) {
        //     $table->dropForeign('events_event_category_foreign');
        // });

        Schema::dropIfExists('events');
    }
}
