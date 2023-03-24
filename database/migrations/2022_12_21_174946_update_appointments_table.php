<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('pet_appointments', function (Blueprint $table) {
                 $table->dateTime('start')
                 ->nullable(true)
                 ->default(null);

                 $table->dateTime('end')
                 ->nullable(true)
                 ->default(null);

                 $table->boolean('allDay')
                 ->nullable(false)
                 ->default(false);
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
    Schema::table('pet_appointments', function (Blueprint $table) {
                     $table->dropColumn('start');
                     $table->dropColumn('end');
                     $table->dropColumn('allDay');
                 });
    }
}
