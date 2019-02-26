<?php
/**
 * Created by PhpStorm.
 * User: pedrolazari
 * Date: 2019-02-25
 * Time: 20:39
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class Cart {

    CONST session = 'carrinho-lojamobly';

    public function getCart(){
        if(Session::has(self::session)){
            return Session::get(self::session);
        }

        return false;
    }

    public function addProduct(array $product){
        $cart = $this->getCart();

        if(!$cart){
            $cart = [];

            $cart[$product['id']] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'qtd' => $product['qtd'],
            ];
        }else{
            $cart = $cart;

            foreach ($cart as $idItem => $item) {
                if($idItem == $product['id']){
                    $cart[$product['id']] = [
                        'id' => $item['id'],
                        'name' => $product['name'],
                        'price' => $product['price'],
                        'qtd' => $item['qtd'] + $product['qtd'],
                    ];
                }else{
                    $cart[$product['id']] = [
                        'id' => $product['id'],
                        'name' => $product['name'],
                        'price' => $product['price'],
                        'qtd' => $product['qtd'],
                    ];
                }
            }
        }

        Session::put(self::session, $cart);

        return Session::get(self::session);
    }

    public function removeProduct($product_id){
        $cart = $this->getCart();

        unset($cart[$product_id]);


        Session::put(self::session, $cart);
        Session::get(self::session);
    }

    public function cleanCart(){
        Session::remove(self::session);
    }
}