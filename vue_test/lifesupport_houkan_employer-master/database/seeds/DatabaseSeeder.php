<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\Employer::insert([
            'name' => 'Name',
            'email' => 'employer@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
