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
        $user = \App\User::create([
            'name' => 'admin',
            'age' => '30',
            'genre' => 'homme',
            'email' => 'admin@app.com',
            'password' => bcrypt('123456')
        ]);

        $user->attachRole('admin');
    }
}
