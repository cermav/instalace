<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAppointmentsTableRenameStartEnd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('pet_appointments', function (Blueprint $table) {
            $table->renameColumn('start', 'startTime');
            $table->renameColumn('end', 'endTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pet_appointments', function (Blueprint $table) {
                    $table->dropColumn('start');
                    $table->dropColumn('end');

                    $table->renameColumn('startTime', 'start');
                    $table->renameColumn('endTime', 'end');
                });
    }
}
