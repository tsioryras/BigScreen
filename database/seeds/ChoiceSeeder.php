<?php

use Illuminate\Database\Seeder;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $choices = json_decode(file_get_contents(database_path('data\choices.json')));

        dd($choices);
    }
}
