<?php

namespace App\Observers;

use App\Product;

class ProductsObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function saved(Product $product)
    {
        Product::addAllToIndex();
    }

    public function created(Product $product)
    {
        Product::addAllToIndex();
    }

    public function creating(Product $product)
    {
       if(!isset($product->updated_price)){
           $product->updated_price = '0.00';
       }
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        Product::addAllToIndex();
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        Product::addAllToIndex();
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        Product::addAllToIndex();
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
