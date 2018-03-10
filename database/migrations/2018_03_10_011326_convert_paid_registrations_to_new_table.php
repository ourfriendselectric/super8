<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Registration;

class ConvertPaidRegistrationsToNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $registrations = Registration::all();

        $paid_registrations = [];
        foreach($registrations as $registration) {
            if($registration->paid === true) {
                $paid_registrations[] = [
                    'registration_id' => $registration->id,
                    'year' => '2018',
                ];
            }
        }

        DB::table('paids')->insert($paid_registrations);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('paids')->truncate();
    }
}
