<?php

use App\Choice;
use App\Type;
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
        $this->call(TypeSeeder::class);
        foreach ($choices as $choice) {
            $type = $type = Type::where('value', $choice->type)->first();
            $newChoice = factory(Choice::class)->create();
            $newChoice->label = $choice->label;
            $newChoice->content = $choice->content;
            $newChoice->type()->associate($type)->save();
        }
    }
}
