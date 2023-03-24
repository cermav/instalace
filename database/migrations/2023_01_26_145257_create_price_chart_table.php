<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceChartTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('price_chart', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('doctor_id');
            $table->string('description', 500);
            $table->integer('price');
            $table->string('currency');
            $table->boolean('display')->default(false);
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->integer('record_id');
            $table->integer('item_id');
            $table->primary(['record_id', 'item_id']);
            $table->timestamps();
            $table->integer('count');
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table->string('ICO')->default(null);
            $table->string('DIC')->default(null);
            $table->string('bank_account')->default(null);
        });

        Schema::table('pet_records', function (Blueprint $table) {
            $table->integer('appointment_id');
            $table->renameColumn('notes', 'medical_record');
            $table->time('time')->default(null);
            $table->integer('pet_id')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('price_chart');
        Schema::dropIfExists('invoice_items');

        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn(['ICO',
                                'DIC',
                                'bank_account']);
        });

        Schema::table('pet_records', function (Blueprint $table) {
            $table->dropColumn(['appointment_id',
                                'medical_record',
                                'time',
                                'bank_account']);

            $table->integer('appointment_id');
            $table->foreign('appointment_id')->references('id')->on('pet_appointments');
            $table->renameColumn('notes', 'medical_record')->default(null);
            $table->string('DIC')->default(null);
            $table->time('time')->default(null);
        });
    }
}
