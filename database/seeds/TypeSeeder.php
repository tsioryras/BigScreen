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
        $types = [
            [
                'value' => 'A',
                'description' => 'Un choix parmis plusieurs proposition',
            ],
            [
                'value' => 'B',
                'description' => 'Un champ de saisie de 255 caractères maximum ',
            ],
            [
                'value' => 'C',
                'description' => 'Un choix numérique (1 à 5)',
            ]
        ];

        foreach ($types as $type) {
            factory(Type::class)->create(
                [
                    'value' => $type['value'],
                    'description' => $type['description']
                ]
            );
        }
    }
}
