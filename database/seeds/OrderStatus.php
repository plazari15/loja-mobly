<?php

use Illuminate\Database\Seeder;

class OrderStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::truncate();

        OrderStatus::create([
            'code' => 'nao_processado',
            'description' => 'Não Processado'
        ]);

        OrderStatus::create([
            'code' => 'aguardando_pgto',
            'description' => 'Aguardando pagamento'
        ]);

        OrderStatus::create([
            'code' => 'pago',
            'description' => 'Pago'
        ]);

        OrderStatus::create([
            'code' => 'estoque',
            'description' => 'Separação de Estoque'
        ]);

        OrderStatus::create([
            'code' => 'nfe',
            'description' => 'Emitindo NFe'
        ]);

        OrderStatus::create([
            'code' => 'coleta',
            'description' => 'Aguardando Coleta'
        ]);

        OrderStatus::create([
            'code' => 'transporte',
            'description' => 'Com Transportadora'
        ]);

        OrderStatus::create([
            'code' => 'concluido',
            'description' => 'Concluído'
        ]);
    }
}
