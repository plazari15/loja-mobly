<?php

use Illuminate\Database\Seeder;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Feature::create([
            'name' => 'Cor Branca'
        ]);

        \App\Feature::create([
            'name' => 'Tela Grande'
        ]);

        \App\Feature::create([
            'name' => 'Tela Pequena'
        ]);

        \App\Feature::create([
            'name' => 'Couro'
        ]);

        \App\Feature::create([
            'name' => 'Couro Sintético'
        ]);

        \App\Feature::create([
            'name' => 'Anti-Aderente'
        ]);
    }
}
