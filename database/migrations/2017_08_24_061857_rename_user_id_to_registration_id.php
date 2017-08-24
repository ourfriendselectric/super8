<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameUserIdToRegistrationId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->renameColumn('user_id', 'registration_id');
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->renameColumn('user_id', 'registration_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->renameColumn('registration_id', 'user_id');
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->renameColumn('registration_id', 'user_id');
        });
    }
}
