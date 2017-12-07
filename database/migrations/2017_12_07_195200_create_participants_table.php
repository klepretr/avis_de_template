<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->integer('id_outing');
            $table->string('token');
            $table->boolean('left');
            $table->boolean('arrived');
            $table->primary(['id_outing', 'token']);

            // $table->foreign('id_outing')
            //     ->references('outings')
            //     ->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('participants', function (Blueprint $table) {
        //     $table->dropForeign('participants_id_outing_foreign');
        // });

        Schema::dropIfExists('participants');
    }
}
