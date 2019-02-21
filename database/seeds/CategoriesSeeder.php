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
        \App\Categories::truncate();

        \App\Categories::create([
            'name'          => 'Roupas',
            'description'   => 'Categoria de Ropas'
        ]);
    }
}
