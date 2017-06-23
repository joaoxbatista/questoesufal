<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
          'name' => 'João Batista Gomes Silva',
        	'email' => 'admin@admin.com',
          'enrollment' => '00003698',
        	'password' => bcrypt('admin')
        ]);
    }
}
