<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'João Batista Gomes Silva',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin'),
        	'phone' => '981413960',
        	'address' => 'Coité do Nóia'
        ]);
    }
}
