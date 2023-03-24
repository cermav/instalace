<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddFirstNameLastName extends Migration
{
    // ACCEPTED DEFAULT NULL


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users', function (Blueprint $table) {
                                $table->string('firstName')->default("firstName");
                                $table->string('lastName')->default("lastName");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('users', function (Blueprint $table) {
                            $table->dropColumn('firstName');
                            $table->dropColumn('lastName');
        });
    }
}
