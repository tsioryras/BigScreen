<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(TypeSeeder::class);
        $questions = file_get_contents('../data/question.json');
        dd($questions);
    }
}
