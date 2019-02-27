<?php

namespace App\Jobs;

use App\Client;
use App\Order;
use App\OrderItem;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EmitirPedido implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dadosPedido;
    private $produtos;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($dadosPedido, $produtos)
    {
        $this->dadosPedido = $dadosPedido;
        $this->produtos = $produtos;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \DB::beginTransaction();
        try { //INICIANDO CRIACAO DO PEDIDO
            $user = User::whereEmail($this->dadosPedido['dadosPessoais']['email'])->first();
            if (!$user) {
                \Log::info(__METHOD__ . " :: Iniciando a criação do Usuário", [$this->dadosPedido['dadosPessoais']['nome']]);

                $user = User::create([
                    'name' => $this->dadosPedido['dadosPessoais']['nome'],
                    'email' => $this->dadosPedido['dadosPessoais']['email'],
                    'password' => bcrypt('12345'),
                    'is_admin' => false
                ]);
            }


            $clientArray = [
                'user_id' => $user->id,
                'name' => $this->dadosPedido['dadosPessoais']['nome'],
                'lastname' => $this->dadosPedido['dadosPessoais']['sobrenome'],
                'email' => $this->dadosPedido['dadosPessoais']['email'],
                'taxvat' => $this->dadosPedido['dadosPessoais']['cpfcnpj'],
                'rg' => $this->dadosPedido['dadosPessoais']['rg'],
                'ddd_cel' => $this->dadosPedido['dadosPessoais']['ddd_cel'],
                'celphone' => $this->dadosPedido['dadosPessoais']['celphone'],
                'ddd_tel' => $this->dadosPedido['dadosPessoais']['ddd_cel'],
                'telephone' => $this->dadosPedido['dadosPessoais']['celphone']
            ];

            $client = Client::where('user_id', $user->id)
                ->where('taxvat', $this->dadosPedido['dadosPessoais']['cpfcnpj'])
                ->first();

            if ($client) {
                \Log::info(__METHOD__ . " :: Iniciando a atualização do cliente");
                $client->update($clientArray);
            } else {
                \Log::info(__METHOD__ . " :: Iniciando a criação do cliente");
                $client = Client::create($clientArray);
            }

            \Log::info(__METHOD__ . " :: Iniciando a criação do pedido");
            $order = Order::create([
                'taxvat' => $this->dadosPedido['dadosPessoais']['cpfcnpj'],
                'client_id' => $client->id,
                'shipping_zip_code' => $this->dadosPedido['dadosPessoais']['cep'],
                'shipping_street' => $this->dadosPedido['dadosPessoais']['endereco'],
                'shipping_city' => $this->dadosPedido['dadosPessoais']['cidade'],
                'shipping_state' => $this->dadosPedido['dadosPessoais']['estado'],
                'shipping_neighborhood' => $this->dadosPedido['dadosPessoais']['bairro'],
                'shipping_number' => $this->dadosPedido['dadosPessoais']['numero'],
                'shipping_complement' => $this->dadosPedido['dadosPessoais']['complemento'] ?? 'S/C',

                'invoice_zip_code' => $this->dadosPedido['dadosFaturamento']['cep'],
                'invoice_street' => $this->dadosPedido['dadosFaturamento']['endereco'],
                'invoice_city' => $this->dadosPedido['dadosFaturamento']['cidade'],
                'invoice_state' => $this->dadosPedido['dadosFaturamento']['estado'],
                'invoice_neighborhood' => $this->dadosPedido['dadosFaturamento']['bairro'],
                'invoice_number' => $this->dadosPedido['dadosFaturamento']['numero'],
                'invoice_complement' => $this->dadosPedido['dadosFaturamento']['complemento']  ?? 'S/C',
                'status_id' => 1,
            ]);


            foreach ($this->produtos as $produto) {
                \Log::info(__METHOD__ . " :: Iniciando a criação dos itens do pedido");
                OrderItem::create([
                    'product_id' => $produto['id'],
                    'order_id' => $order->id,
                    'quantity' => $produto['qtd'],
                    'price' => $produto['price'],
                    'discount' => 0
                ]);
            }
            \DB::commit();
            return true;
        }catch (\Exception $e){
            \Log::error(__METHOD__.' '.$e->getMessage());
            \DB::rollback();
            return false;
        }

    }
}
