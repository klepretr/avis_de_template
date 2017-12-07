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
            $table->integer('id_outing')->unsigned();
            $table->string('token');
            $table->boolean('left');
            $table->boolean('arrived');
            $table->primary(['id_outing', 'token']);

            Schema::table('participants', function (Blueprint $table) {
                $table->foreign('id_outing')
                      ->references('id')
                      ->on('outings')
                      ->onDelete('cascade');
            });
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
