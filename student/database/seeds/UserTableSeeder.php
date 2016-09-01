<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();

        DB::table('users')->insert([
            [
                'name' => 'Tony',
                'email' => 'tony@tony.fr',
                'password' =>  Hash::make('Tony'),
                'role' => 'administrator'
            ],
        ]);
    }
}
