<?php

namespace App\Http\Controllers\Api;

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
        if(Cart::changeProduct($request->produto)){
            return \Response::json([
                'message' => 'produto Atualizado com sucesso!'
            ], 200);
        }
    }
}
