<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\EmitirPedidoRequest;
use App\Jobs\EmitirPedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facades\App\Helpers\Cart as Cart;

class CartController extends Controller
{
    public function getItems(){
        $cart = Cart::getCart();

        $subtotal = Cart::getPrice();
        return \Response::json([
            'cart' => $cart,
            'qtdItens' => count($cart),
            'subtotal' => $subtotal
        ], 200);
    }

    public function mudaProduto(Request $request){
        try{
            Cart::changeProduct($request->produto);

            return \Response::json([
                'subtotal' => Cart::getPrice(),
                'message' => 'produto Atualizado com sucesso!'
            ], 200);
        }catch (\Exception $e){
            return \Response::json([
                'message' => 'erro ao alterar produto'
            ], 400);
        }
    }

    public function deletaProduto(Request $request){

        try{
            Cart::removeProduct($request->produto['id']);

            return \Response::json([
                'message' => 'produto Removido com sucesso!'
            ], 200);
        }catch (\Exception $e){
            return \Response::json([
                'message' => 'Erro ao remover produto!'
            ], 400);
        }



    }

    public function emitirPedido(EmitirPedidoRequest $request){
        if(!$request->validated()){
            return \Response::json([
                'message' => 'Erro ao validar campos do pedido. Verifique os campos e tente novamente.!'
            ], 400);
        }

        EmitirPedido::dispatchNow($request->all(), Cart::getCart());


    }
}
