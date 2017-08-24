<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Patrick Wadden',
            'email' => 'patwadden@gmail.com',
            'password' => \Hash::make('Noeight8!'),
        ]);
    }
}
