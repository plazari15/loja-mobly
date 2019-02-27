<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Categories::create([
            'name'          => 'Roupas',
            'description'   => 'Categoria de Ropas',
            'children' => [
                [
                    'name' => 'Masculino',
                    'children' => [
                        [
                            'name' => 'Camisetas',
                        ],
                        [
                            'name' => 'Calças',
                        ],
                        [
                            'name' => 'Bermudas',
                        ],
                        [
                            'name' => 'Sapatos',
                        ],
                        [
                            'name' => 'Bonés',
                        ],
                    ]
                ],
                [
                    'name' => 'Femininas',
                    'children' => [
                        [
                            'name' => 'Camisetas',
                        ],
                        [
                            'name' => 'Calças',
                        ],
                        [
                            'name' => 'Saias',
                        ],
                        [
                            'name' => 'Sapatos',
                        ],
                        [
                            'name' => 'Bonés',
                        ],
                    ]
                ]
            ]
        ]);

        \App\Categories::create([
            'name'          => 'Calçados',
            'description'   => 'Categoria de Calçados',
            'children' => [
                [
                    'name' => 'Masculino',
                    'children' => [
                        [
                            'name' => 'Tamanho 36 ao 38',
                        ],
                        [
                            'name' => 'Tamanho 39 ao 41',
                        ],
                        [
                            'name' => 'Tamanho 41 ao 43',
                        ],
                    ]
                ],
                [
                    'name' => 'Femininas',
                    'children' => [
                        [
                            'name' => 'Tamanho 32 ao 34',
                        ],
                        [
                            'name' => 'Tamanho 35 ao 37',
                        ],
                        [
                            'name' => 'Tamanho 38 ao 40',
                        ],
                    ]
                ]
            ]
        ]);
    }
}
