<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\OrderStatus::truncate();

        \App\OrderStatus::create([
            'code' => 'nao_processado',
            'description' => 'Não Processado'
        ]);

        \App\OrderStatus::create([
            'code' => 'aguardando_pgto',
            'description' => 'Aguardando pagamento'
        ]);

        \App\OrderStatus::create([
            'code' => 'pago',
            'description' => 'Pago'
        ]);

        \App\OrderStatus::create([
            'code' => 'estoque',
            'description' => 'Separação de Estoque'
        ]);

        \App\OrderStatus::create([
            'code' => 'nfe',
            'description' => 'Emitindo NFe'
        ]);

        \App\OrderStatus::create([
            'code' => 'coleta',
            'description' => 'Aguardando Coleta'
        ]);

        \App\OrderStatus::create([
            'code' => 'transporte',
            'description' => 'Com Transportadora'
        ]);

        \App\OrderStatus::create([
            'code' => 'concluido',
            'description' => 'Concluído'
        ]);
    }
}
