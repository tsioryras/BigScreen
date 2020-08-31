<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = $questions = json_decode(file_get_contents(database_path('data\types.json')));
        foreach ($types as $type) {
            factory(Type::class)->create(
                [
                    'value' => $type->value,
                    'description' => $type->description
                ]
            );
        }
    }
}
