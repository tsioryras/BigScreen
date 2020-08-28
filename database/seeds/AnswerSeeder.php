<?php

use App\Answer;
use App\Link;
use App\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(QuestionSeeder::class);
        $faker = Faker\Factory::create('fr_FR');
        $questions = Question::all();

        for ($i = 0; $i < 20; $i++) {
            $link = factory(Link::class)->create();
            $linkValue = '';
            foreach ($questions as $question) {

                $answer = factory(Answer::class)->create();
                switch ($question->type->value) {
                    case 'B':
                        $specific = false;
                        if ($questions[0] === $question) {
                            $answer->value = $faker->freeEmail;
                            $link->value = Hash::make($answer->value . now());
                            $specific = true;
                        }

                        if ($questions[1] === $question) {
                            $answer->value = rand(13, 60);
                            $specific = true;
                        }

                        if ($questions[4] === $question) {
                            $answer->value = $faker->jobTitle;
                            $specific = true;
                        }

                        if (!$specific) {
                            $answer->value = $faker->sentence(1, 10);
                        }
                        $linkValue .= $answer->value;
                        break;
                    default:
                        $answer->value = $faker->randomElement($question->choice->content);
                        break;
                }

                $answer->link()->associate($link);
                $answer->question()->associate($question);
                $answer->save();
            }
        }
    }
}
