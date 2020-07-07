<?php

use Illuminate\Database\Seeder;

class SondagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sondage = \App\Sondage::create([
            'title' => 'Titre de Sondage',
            'description' => 'Description de sondage',
            'question' => 'votre question '
        ]);

        $users = \App\User::all();

        foreach ($users as $user) {

            $sondage->users()->attach($user->id);
        }


    }
}
