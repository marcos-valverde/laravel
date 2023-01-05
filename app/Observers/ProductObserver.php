<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the product "creating" event.
     *
     * @param  \App\Models\Product  $category
     * @return void
     */
    public function creating(Product $product)
    {
        $product->flag =  Str::kebab($product->title);
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        $product->flag =  Str::kebab($product->title);
    }

}
