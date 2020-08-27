<?php

use App\Choice;
use App\Question;
use App\Type;
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
        $questions = json_decode(file_get_contents(database_path('data\questions.json')));
        $this->call(ChoiceSeeder::class);
        foreach ($questions as $question) {
            $choice = Choice::where('label', $question->choice)->first();
            $type = Type::where('value', $question->type)->first();
            $newQuestion = factory(Question::class)->create();
            $newQuestion->label = $question->label;
            $newQuestion->type()->associate($type);
            $newQuestion->choice()->associate($choice);
            $newQuestion->save();
        }
    }
}
