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
    public function up() {
        Schema::table('pet_appointments', function (Blueprint $table) {
                     $table->integer('pet_id')
                     ->nullable(true)
                     ->default(null)->change();

                     $table->time('start')->change();

                     $table->time('end')->change();

                     $table->boolean('accepted')
                     ->nullable(false)
                     ->default(false);

                     $table->integer('assigned_to')
                     ->nullable(true)
                     ->default(null);

                     $table->string('phone_number')
                     ->nullable(true)
                     ->default(null);

                     $table->string('mail')
                     ->nullable(true)
                     ->default(null);

                     $table->string('name')
                     ->nullable(true)
                     ->default(null);

                     $table->string('surname')
                     ->nullable(true)
                     ->default(null);
                 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $table->dropColumn('pet_id');
        $table->dropColumn('start');
        $table->dropColumn('end');
        $table->dropColumn('accepted');
        $table->dropColumn('assigned_to');
        $table->dropColumn('phone_number');
        $table->dropColumn('mail');
        $table->dropColumn('name');
        $table->dropColumn('surname');
    }
}
