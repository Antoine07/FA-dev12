<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'back'],
            ['name' => 'front'],
            ['name' => 'compile'],
            ['name' => 'async'],
            ['name' => 'relation model'],
            ['name' => 'big database'],
        ]);
    }
}
