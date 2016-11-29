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
        \App\Admin::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'fullname' => 'admin'
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
